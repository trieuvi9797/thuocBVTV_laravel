<?php


namespace App\Http\Services\Category;

use App\Http\Requests\Category\CreateFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    public function getParent()
    {
        return Category::where('parent_id', 0)->get();
    }
    public function getChild()
    {
        return Category::with('childrents')->where('parent_id', 0)->get();
    }
    public function show()
    {
        return Category::select('name', 'id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }
    public function getAll()
    {
        return Category::orderbyDesc('id')->paginate(30);
    }

    public function getId($id)
    {
        return Category::where('id', $id)->firstOrFail();
    }
    public function getProduct($category)
    {
        return $category->products()->select('id', 'name', 'price', 'sale', 'image')
                                    ->orderByDesc('id')->paginate(12);
    }
    public function create($request)
    {
        try {
            Category::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'slug' => Str::slug($request->input('name'),'-'),
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }


    public function update($request, $category): bool
    {
        if ($request->input('parent_id') != $category->id) {
            $category->parent_id = (int)$request->input('parent_id');
        }

        $category->name = (string)$request->input('name');
        $category->save();

        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $categories = Category::where('id', $id)->first();
        if ($categories) {
            return Category::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }


    

    // public function getProduct($categories, $request)
    // {
    //     $query = $categories->products()
    //         ->select('id', 'name', 'price', 'price_sale', 'thumb')
    //         ->where('active', 1);

    //     if ($request->input('price')) {
    //         $query->orderBy('price', $request->input('price'));
    //     }

    //     return $query
    //         ->orderByDesc('id')
    //         ->paginate(12)
    //         ->withQueryString();
    // }
}
