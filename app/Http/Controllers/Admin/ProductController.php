<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Category;
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
    protected $category;

    public function __construct(Product $product, ProductAdminService $productService, Category $category)
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
    public function search($request)
    {
        dd("ok");
        $search = $this->productService->search($request);
        return view('admin.products.index', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $search
        ]);
    }
    public function create()
    {
        return view('admin.products.create', [
            'title' => 'Thêm Sản Phẩm Mới',
            'category' => $this->productService->getCategory()
        ]);
        
    }
    public function store(CreateFormRequest $request)
    { 
        $result = $this->productService->insert($request);
        if($result){
            return redirect('/admin/products/index');
        }
        return redirect()->back();
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'title' => 'Chi tiết sản phẩm',
            'product' => $product,
            'category' => $this->productService->getCategory(),
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Thêm Sản Phẩm Mới',
            'product' => $product,
            'category' => $this->productService->getCategory()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if($result){
            return redirect('/admin/products/index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm.'
            ]);
        }
        return response()->json(['error => true']);
    }
}
