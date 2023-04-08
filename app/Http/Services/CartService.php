<?php 
namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('quantity_Products');
        $product_id = (int)$request->input('product_id');
        if($qty <= 0 || $product_id <= 0){
            Session::flash('error', 'Số lượng hoặc sản phẩm không hợp lệ. Vui lòng kiểm tra lại.');
            return false;
        }
        $carts = Session::get('carts');
        if(is_null($carts)){
            Session::put('carts', [$product_id => $qty]);
            return true;
        }
        
        $exists = Arr::exists($carts, $product_id);
        if($exists){
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts[$product_id]);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
    }
    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id','name','price','sale','image')
                    ->whereIn('id', $productId)
                    ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }
    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }
    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if(is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'note' => $request->input('note')
            ]);
            $this->getProduct($carts, $customer->id);
            DB::commit();
            Session::flash('success', 'Đặt hàng thanh công');
            Session::flash();   //delete session cart
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt hàng lỗi. Vui lòng thử lại...');
            return false;
        }
    }
    protected function infoProductCart($carts, $customer_id)
    {
        $productID = array_keys($carts);
        $products = Product::select('id','name','price','sale','image')
                    ->whereIn('id', $productID)
                    ->get();
        $data = [];
        foreach ($products as $key => $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantity' => $carts[$product->id],
                'price' => $product->sale != 0 ? $product->sale :$product->price
            ];
        }
        return Cart::insert($data);
    }
}