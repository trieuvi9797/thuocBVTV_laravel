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
    public function addOrder()
    {
        return view('client.carts.create',[
            'title' => 'Đơn hàng của bạn',
            'content' => Cart::content()
        ]);
    }
    public function createOrder(Request $request)
    {
       
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->note = $request->note;
        $customer->save();
        
        $bill = new Bill();
        $bill->customer_id = $request->id;
        $bill->active = 1;
        $bill->save();
        dd($bill);

        foreach (Cart::content() as $value) {
            $detail = new BillDetail();
            $detail->bill_id = $bill->id;
            $detail->product_id = $value->id;
            $detail->quantity = $value->qty;
            $detail->price = $value->price;
            $detail->save();
       }

       return redirect('/dat-hang-thanh-cong');


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
