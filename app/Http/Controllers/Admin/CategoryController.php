<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Category\CategoryService as CategoryCategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $category;

    public function __construct(CategoryCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(){
        return view('admin.categories.index', [
            'title' => 'Danh mục sản phẩm',
            'list_category' => $this->categoryService->getAll()
        ]);
    }
    public function create(){
        return view('admin.categories.create', [
            'title' => 'Thêm danh mục ',
            'parentCategories' => $this->categoryService->getParent()  
        ]);
    }
    public function store(CreateFormRequest $request){
        $this->categoryService->create($request);

        return redirect()->back();
    }
}
