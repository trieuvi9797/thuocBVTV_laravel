<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $category;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(){
        if(Auth::user()->user_type == 'AD'){
            return view('admin.categories.index', [
                'title' => 'Danh mục sản phẩm',
                'list_category' => Category::orderByDesc('id')->search()->paginate(30)
            ]);
        }
        return redirect()->back();        
    }

    public function create(){
        if(Auth::user()->user_type == 'AD'){
            return view('admin.categories.create', [
                'title' => 'Thêm danh mục ',
                'parentCategories' => $this->categoryService->getParent()  
            ]);
        }
        return redirect()->back();
    }

    public function store(CreateFormRequest $request){
        $this->categoryService->create($request);
        return redirect('/admin/categories/index');

    }

    public function show(Category $category)
    {   
        if(Auth::user()->user_type == 'AD'){
            return view('admin.categories.edit',[
                'title' => 'Chỉnh sửa danh mục: ' . $category->name,
                'category' => $category,
                'parentCategories' => $this->categoryService->getParent()  
            ]);        
        }
        return redirect()->back();

    }

    public function update(Category $category, CreateFormRequest $request)
    {
        $this->categoryService->update($request, $category);
        return redirect('/admin/categories/index');
    }

    public function destroy(Request $request):JsonResponse
    {
        if(Auth::user()->user_type == 'AD'){
            $result = $this->categoryService->destroy($request);
            if($result){
                return $request->json([
                    'error' => false,
                    'message' => 'Xóa danh mục thành công.'
                ]);
            }
            return  response()->json([
                'error' => true
            ]);
        }        
        return redirect()->back();

    }
}
