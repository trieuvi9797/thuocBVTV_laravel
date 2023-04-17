<?php 
namespace App\Http\Services;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartService
{
    // public function create($request)
    // {
    //     $qty = (int)$request->input('quantity_Products');
    //     $product_id = (int)$request->input('product_id');
    //     if($qty <= 0 || $product_id <= 0){
    //         Session::flash('error', 'Số lượng hoặc sản phẩm không hợp lệ. Vui lòng kiểm tra lại.');
    //         return false;
    //     }
    //     $carts = Session::get('carts');
    //     if(is_null($carts)){
    //         Session::put('carts', [$product_id => $qty]);
    //         return true;
    //     }
        
    //     $exists = Arr::exists($carts, $product_id);
    //     if($exists){
    //         $carts[$product_id] = $carts[$product_id] + $qty;
    //         Session::put('carts', $carts[$product_id]);
    //         return true;
    //     }
    //     $carts[$product_id] = $qty;
    //     Session::put('carts', $carts);
    // }
    // public function getProduct()
    // {
    //     $carts = Session::get('carts');
    //     if(is_null($carts)) return [];

    //     $productId = array_keys($carts);
    //     return Product::select('id','name','price','sale','image')
    //                 ->whereIn('id', $productId)
    //                 ->get();
    // }

    // public function update($request)
    // {
    //     Session::put('carts', $request->input('num_product'));
    //     return true;
    // }
    // public function remove($id)
    // {
    //     $carts = Session::get('carts');
    //     unset($carts[$id]);

    //     Session::put('carts', $carts);
    //     return true;
    // }
    public function createOrder($request)
    {
        
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->note = $request->note;
            $customer->save();
            
            $bill = new Bill();
            $bill->customer_id = $request->id;
            $bill->bill_active_id = 1;
            $bill->save();
            dd($bill);

            foreach (Cart::content() as $value) {
                $detail = new BillDetail();
                $detail->bill_id = $bill->id;
                $detail->product_id = $value->id;
                $detail->quantity = $value->qty;
                $detail->price = $value->price;
                $detail->save();
    dd('ok');        }
            Session::flash('success', 'Đặt hàng thành công.');
        } catch (\Exception $err) {
            Session::flash('error', 'Đặt hàng chưa được. Vui lòng kiểm tra lại.');
        }
    }
   
}