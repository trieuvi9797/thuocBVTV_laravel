<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\InfoPage\InfoPageService;
use App\Http\Services\Product\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $productService;
    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function index(Request $request, $id, $slug = '')
    {
        $category = $this->categoryService->getId($id);
        $parentCategory =$this->categoryService->getParent();
        $products = $this->categoryService->getProduct($category);
        $productSale = $this->productService->getProductSale();
        $productNew = $this->productService->getProductNew();
        $productSold = $this->productService->getProductSold();
        return view('client.category', [
            'title' => $category->name,
            'products' => $products,
            'category'=> $category,
            'productSale' => $productSale,
            'productNew' => $productNew,
            'productSold' => $productSold,
            'parentCategory' => $parentCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Thêm danh mục',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
