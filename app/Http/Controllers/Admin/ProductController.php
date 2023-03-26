<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use App\Traits\UploadImageTrait;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use UploadImageTrait;
    protected $productService;
    protected $product;

    public function __construct(Product $product, ProductAdminService $productService)
    {
        $this->productService = $productService;
        $this->product = $product;
    }

    public function index()
    {
        return view('admin.products.index', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get()
        ]);
    }
    public function create()
    {
        return view('admin.products.create', [
            'title' => 'Thêm Sản Phẩm Mới',
            'categories' => $this->productService->getCategory()
        ]);
    }
    public function store(Request $request)
    { 
        try {
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
            //insert image vào bảng hinhanh
            // if ($request->hasFile('img_detail')) {
            //     foreach ($request->img_detail as $Item) {
            //         $dataIMGdetail = $this->StorageTraitUploadMultiple($Item, 'product');
            //         $product->images()->create([
            //             'image' => $dataIMGdetail,
            //         ]);
            //     }
            // }
            DB::commit();
        return redirect()->back();

        }catch (\Exception $ex) {
        DB::rollBack();
        return view('admin.products.create');
    }
}

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Thêm Sản Phẩm Mới',
            'categories' => $this->productService->getCategory()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
