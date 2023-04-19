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
    public function getCustomerBill($customer)
    {
        return $customer->bill()->select('id', 'active', 'total_price')->orderByDesc('id')->paginate(10);
    }
    public function getBillDetail($id)
    {
        return BillDetail::where('bill_id', $id)->orderByDesc('id')->paginate(10);
    }
}