<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\InfoPage\InfoPageService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $infoPageService;
    public function __construct(CategoryService $categoryService, InfoPageService $infoPageService)
    {
        $this->categoryService = $categoryService;
        $this->infoPageService = $infoPageService;
    }
    public function index(Request $request, $id, $slug = '')
    {
        $parentCategories = $this->categoryService->getParent();
        $infoPageService = $this->infoPageService->show();
        $category = $this->categoryService->getId($id);
        $products = $this->categoryService->getProduct($category);
        return view('client.products.index', [
            'title' => $category->name,
            'products' => $products,
            'category'=> $category,
            'infoPage' => $infoPageService,
            'parentCategories' => $parentCategories
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
