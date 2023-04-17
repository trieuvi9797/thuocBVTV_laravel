<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    // public function index(Request $request)
    // {
    //     $result = $this->cartService->create($request);
    //     if($result === false){
    //         return redirect()->back();
    //     }
    //     return redirect('/carts');
    // }

    // public function show()
    // {
    //     $products = $this->cartService->getProduct();
    //     return view('client.carts.list',[
    //         'title' => 'Giở hàng',
    //         'products' => $products,
    //         'carts' => Session::get('carts')
    //     ]);
    // }
    // public function update(Request $request)
    // {
    //     $result = $this->cartService->update($request);
    //     if($result === false){
    //         return redirect()->back();
    //     }
    //     return redirect('/carts');
    // }

    // public function remove($id = 0)
    // {
    //     $result = $this->cartService->remove($id);
    //     if($result === false){
    //         return redirect()->back();
    //     }
    //     return redirect('/carts');
    // }
    
    // public function addCart(Request $request)
    // {
    //     $result = $this->cartService->addCart($request);
    //     if($result === false){
    //         return redirect()->back();
    //     }
    //     return redirect('/');
    // }

    public function index()
    {
        return view('client.carts.list',[
            'title' => 'Giỏ hàng của bạn',
            'content' => Cart::content()
        ]);
    }

    public function addCart($id)
    {
        $product = Product::where('id', $id)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
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
			'phone' => ['required', 'max:191', 'digit:9'],
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
            $customer->name       = $request->name;
            $customer->phone      = $request->phone;
            $customer->email      = $request->email;
            $customer->address    = $request->address;
            if(Auth::check()) { $customer->user_id = Auth::user()->id;} 
        
            if($customer->save())
                {   //lưu thong tin dơn hàng    
                    $customer_id       = Customer::max('id');   
                    $bill = new Bills;
                    $bill->customer_id = $customer_id;

                    $total_price = Cart::subtotal(0,'','');

                    $coupon_value = 0; //set coupon defult
                    if(session('coupon'))
                    {
                        //Kiểm tra xem có nhập mã giảm giá không
                        $bill->coupon_id = session('coupon');
                        $coupon = Coupon::find(session('coupon'));
                        $coupon_value = $coupon->value;
                    }

        // $result = $this->cartService->createOrder($request);
        // if($result === false){
        //     return redirect()->back();
        // }
    }
    public function successOrder()
    {
        Cart::destroy();
        return view('client.carts.thanks', [
            'title' => 'Đặt hàng thành công.'
        ]);
    }
}
