<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Jobs\SendMail;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    

    public function index()
    {
        return view('client.carts.list',[
            'title' => 'Giỏ hàng của bạn',
            'content' => Cart::content()
        ]);
    }

    public function addCart($id, Request $request)
    {
        $product = Product::where('id', $id)->first();
        $qty = (int)$request->input('qty');
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'weight' => 0,
            'options' => [
                'image' => $product->image
            ]
        ]);
            return redirect('/gio-hang');
    }
    
    public function remove($row_id)
    {
        Cart::remove($row_id);
        return redirect('/gio-hang');
    }
    public function upQuantity($row_id)
    {
        $row = Cart::get($row_id);
        $product = Product::find($row->id);
        if($row->qty < $product->quantity)
        {
            Cart::update($row_id, $row->qty + 1);
            Session::flash('error', 'Sản phẩm trong kho không đủ số lượng.');
            return redirect('/gio-hang');
        }
        return redirect('/gio-hang');
    }
    public function downQuantity($row_id)
    {
        $row = Cart::get($row_id);
        if($row->qty > 1)
        {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect('/gio-hang');
    }
    public function getCheckout()
    {
        $user = Auth::user();
        return view('client.carts.create',[
            'title' => 'Đơn hàng của bạn',
            'content' => Cart::content(),
            'user' => $user,
        ]);
    }
    
    public function postCheckout(Request $request)
    {
        $this->validate($request, [
			'phone' => ['required', 'max:191'],
			'address' => ['required', 'max:191'],
		]);
        //Kiêm tra xem số lượng mỗi sản phẩm có còn trong kho hàng nữa không
        $flag = true;
        $list_soil_out = "";
        foreach (Cart::content() as $row) {
            $rowId = $row->rowId;
            $product_qty = Product::where('id',$row->id)->select('quantity')->get()->first();
            $quantity_repository = $product_qty->quantity;
            //Nếu số lượng trong kho bằng 0 thì xóa sản phẩm đó ra khỏi cart
            if($row->qty > $quantity_repository)
            {
                $product = Product::find($row->id);
                $name_pro = $product->name;
                $list_soil_out .= " " . $row->name . " số lượng trong kho còn " . $quantity_repository . " sản phẩm <br/>";
                $flag = false;
                //update lại số lượng sản phẩm trong cart bằng số lượng trong kho.
                Cart::update($rowId,['qty'=>$quantity_repository]);
            }
        }
            //nếu có những sản phẩm đã hết, hoặc số lượng ít hơn lựa chọn thì thông báo cho người dùng
        if($flag == false){
            return redirect('create')->with('error',"Bạn vui lòng kiểm tra lại giỏ hàng: <br/>".$list_soil_out);
        }
        else{
            $customer = new Customer;
            $customer->name    = $request->name;
            $customer->email   = $request->email;
            $customer->phone   = $request->phone;
            $customer->address = $request->address;
            $customer->note    = $request->note;
         
            if(Auth::check()) { $customer->user_id = Auth::user()->id;} 
        
            if($customer->save())
                {   //lưu thong tin dơn hàng    
                    $customer_id = Customer::max('id');   
                    $bill = new Bill();
                    $bill->customer_id = $customer_id;
                    $total_price = Cart::total(0,'','');
                    $bill->total_price = $total_price;
                    if($bill->save())
                    {   //lưu thông tin chi tiết đơn hàng
                        $bill_id  = Bill::max('id');
                        foreach(Cart::content() as $cart)
                        {
                            $detail_bill             = new BillDetail();
                            $detail_bill->bill_id    = $bill_id;
                            $detail_bill->product_id = $cart->id;
                            $detail_bill->quantity   = $cart->qty;
                            // $detail_bill->price      = $cart->price;
                            $detail_bill->price      = $cart->subtotal(0,'','');
                            $detail_bill->save();
    
                            $productID = Product::where('id',$cart->id)->select('quantity')->get()->first();
                            $quantity = $productID->quantity;
                            $qty_remaining = $quantity - $cart->qty; //sl ton = sl kho - sl moi mua
                            $qty_buy = $productID->sold;
                            $sold = $qty_buy + $cart->qty; // sl da ban
                            //cập nhật lại số lượng hàng trong kho
                            $quantity = DB::table('products')
                                            ->where('id',$cart->id)
                                            ->update([
                                                'quantity' => $qty_remaining,
                                                'sold'     => $sold ]);
                        }
                    SendMail::dispatch($customer->email)->delay(now()->addSeconds(2));
                    Cart::destroy();
                    return redirect('/dat-hang-thanh-cong')->with('success',"Thanh toán thành công. Bạn có thể kiểm tra email thanh toán để xem đơn hàng");
                }else{
                    return redirect()->back()->with('error',"Không thể lưu lại thông tin đơn hàng");
                }
            }else{
                 return redirect()->back()->with('error',"Không thể lưu lại thông tin khách hàng");
            }
        }   
    }
    
    public function successfull()
    {
        return view('client.bills.successfull',[
            'title' => 'Đặt hàng thành công',
        ]);
    }

    public function myBill()
    {
    //     $userID = Auth::user()->id;
    //     $customer_ID = Customer::where('user_id',$userID)->select('id')->get();
    //     $bill = Bill::where('customer_id',$customer_ID)->get();
    //     dd($bill);
    //     $customer = Customer::orderByDesc('id')->get();
    //     // dd($bill);
    //     // $billDetail = BillDetail::orderByDesc('id')->paginate(5);

    //     return view('client.bills.myBill', [
    //         'title' => 'Đơn hàng của tôi.',
    //         'bills' => $bill,
    //         // 'billDetails' => $billDetail,
    //         'customers' => $customer,
    //     ]);
    }
}
