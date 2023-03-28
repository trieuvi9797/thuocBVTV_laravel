<?php


namespace App\Http\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    use UploadImageTrait;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getCategory()
    {
        return Category::where('parent_id', '>' , 0)->get();
    }

    protected function isValidPrice($request)
    {

        if($request->input('price') != 0 && $request->input('sale') != 0 && $request->input('sale') >= $request->input('price')){
            Session::flash('error', 'Giá khuyến mãi phải nhỏ hơn giá gốc!');
            return false;
        }
        if($request->input('sale') != 0 && (int)$request->input('price') == 0){
            Session::flash('error', 'Vui lòng nhập giá sản phẩm!');
            return false;
        }
        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $request->except('_token');

            DB::beginTransaction();
            if ($request->hasFile('image')) 
                $img = $this->StorageTraitUpload($request, 'image', 'product');
            $product = $this->product->create([
                'name' => trim($request->name),
                'image' => $img,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'sale' => $request->sale,
                'quantity' => $request->quantity,
            ]);
            DB::commit();

            Session::flash('error', 'Thêm sản phẩm thành công!');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi!');
            Log::info($err->getMessage());
            return false;
        }
        return  true;
    }


    public function get()
    {
        return Product::orderByDesc('id')->paginate(10);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $product->fill($request->input());
            $product->save();
            $request->except('_token');

            
            Session::flash('error', 'Thêm sản phẩm thành công!');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi!');
            Log::info($err->getMessage());
            return false;
        }
        return  true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if($product){
            $product->delete();
            return false;
        }
        return false;
    }
}