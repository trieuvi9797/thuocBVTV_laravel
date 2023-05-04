<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Services\Post\PostService;
use App\Traits\UploadImageTrait;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    use UploadImageTrait;
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $posts = Post::orderByDesc('id')->paginate(10);
            return view('admin.posts.index',[
                'title' => 'Bài viết - Tin tức',
                'posts' => $posts
            ]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->user_type == 'AD'){
            return view('admin.posts.create',[
                'title' => 'Thêm bài viết - tin tức',
            ]);
        }
        return redirect()->back();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => ['required', 'string', 'max:191', 'unique:posts'],
			'image' => ['nullable', 'image', 'max:2048'],
			'author' => ['required'],
			'description_short' => ['required'],
			'description' => ['required'],
		]);
        $result = $this->postService->insert($request);
        if($result){
            return redirect('/admin/posts/index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if(Auth::user()->user_type == 'AD'){
            return view('admin.posts.show',[
                'title' => 'Chi tiết bài viết',
                'post' => $post,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(Auth::user()->user_type == 'AD'){
            return view('admin.posts.edit',[
                'title' => 'Sửa bài viết - tin tức',
                'post' => $post,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $result = $this->postService->update($request, $post);
        if($result){
            return redirect('/admin/posts/index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(Auth::user()->user_type == 'AD'){
            $result = $this->postService->delete($request);
            if($result){
                return response()->json([
                    'error' => false,
                    'message' => 'Xóa thành công sản phẩm.'
                ]);
            }
            return response()->json(['error => true']);
        }
        return redirect()->back();
    }
}
