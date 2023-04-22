<?php


namespace App\Http\Services\Post;

use App\Models\Post;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostService
{
    use UploadImageTrait;

    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function insert($request)
    {
        try {
            if ($request->hasFile('image')) 
                $img = $this->StorageTraitUpload($request, 'image', 'post');
                
                $post = new Post();
                $post->title = $request->title;
                $post->image  = $img;
                $post->author = $request->author;
                $post->description_short = $request->description_short;
                $post->description = $request->description;
                $post->save();
                Session::flash('success', 'Thêm bài viết thành công!');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm bài viết lỗi!');
            Log::info($err->getMessage());
            return false;
        }
        return  true;
    }
    public function update($request, $post)
    {
        try {
            $fileImage = Post::where('id', $request->input('id'))->first();
            if($fileImage){
                Storage::disk('public')->delete('/storage/post'.$fileImage['image']);
                Post::where('id', $post)->delete();
    
            }
            $post->fill($request->input());
            $request->except('_token');
            if ($request->hasFile('image')) 
            $img = $this->StorageTraitUpload($request, 'image', 'post');
            
            $post->title = $request->title;
            $post->image  = $img;
            $post->author = $request->author;
            $post->description_short = $request->description_short;
            $post->description = $request->description;
            $post->save(); 
        
            Session::flash('success', 'Sửa bài viết thành công!');
        } catch (\Exception $err) {
            Session::flash('error', 'Sửa bài viết lỗi!');
            Log::info($err->getMessage());
            return false;
        }
        return  true;
    }

    public function delete($request)
    {
        $post = Post::where('id', $request->input('id'))->first();
        if($post){
            $post->delete();
            return true;
        }
        return false;
    }
    public function postNew(){
        return Post::select('id','title', 'image', 'author', 'description_short', 'created_at')
                    ->orderByDesc('id')->paginate(3);
    }
}