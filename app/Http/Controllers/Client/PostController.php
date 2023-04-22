<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Post\PostService;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Services\Product\ProductService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $productService;
    protected $postService;
    protected $categoryService;

    public function __construct(ProductService $productService, PostService $postService, CategoryService $categoryService)
    {
        $this->productService = $productService;   
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderByDesc('id')->paginate(10);
        return view('client.posts.index',[
            'title' => 'Bài viết - Tin tức',
            'post' => $post,
            'postNew' => $this->postService->postNew(),
            'productSold' => $this->productService->getProductSold(),
            'productNew' => $this->productService->getProductNew(),
            'category' => $this->categoryService->getParent(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $post = Post::where('id', $id)->get();
        return view('client.posts.detail',[
            'title' => 'Chi tiết bài viết',
            'post' => $post,
            'postNew' => $this->postService->postNew(),
            'productSold' => $this->productService->getProductSold(),
            'productNew' => $this->productService->getProductNew(),
            'category' => $this->categoryService->getParent(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
