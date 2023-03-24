<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
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
