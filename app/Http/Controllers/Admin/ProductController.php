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
        $dataCreate = $request->all();
        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request); 
        $product->images()->create(['url'=> $dataCreate['image']]);
        $product->categories()->attach($dataCreate['category_ids']);
        // $this->productService->insert($request);
        return redirect()->back();
    }
}
