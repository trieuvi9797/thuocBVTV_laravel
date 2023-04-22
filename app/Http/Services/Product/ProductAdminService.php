<?php


namespace App\Http\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
    

    public function insert($request)
    {
        try {
            $request->except('_token');

            if ($request->hasFile('image')) 
                $img = $this->StorageTraitUpload($request, 'image', 'product');
                
                $product = new Product();
                $product->name        = $request->name;
                $product->image       = $img;
                $product->description = $request->description;
                $product->category_id = $request->category_id;
                $product->price       = $request->price;
                $product->sale        = $request->sale;
                $product->quantity    = $request->quantity;
                $product->save();

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
        try {
            $fileImage = Product::where('id', $request->input('id'))->first();
            if($fileImage){
                Storage::disk('public')->delete('/storage/product'.$fileImage['image']);
                Product::where('id', $product)->delete();
    
            }
            $product->fill($request->input());
            $request->except('_token');
            if ($request->hasFile('image')) 
            $img = $this->StorageTraitUpload($request, 'image', 'product');
            
            $product->name        = $request->name;
            $product->image       = $img;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->price       = $request->price;
            $product->sale        = $request->sale;
            $product->quantity    = $request->quantity;
            $product->save(); 
            Session::flash('success', 'Sửa sản phẩm thành công!');
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
            return true;
        }
        return false;
    }
}