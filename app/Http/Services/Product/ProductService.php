<?php


namespace App\Http\Services\Product;

use App\Models\Category;
use App\Models\Product;

class ProductService
{

    // public function get($page = null)
    // {
    //     return Product::select('id', 'name', 'price', 'sale', 'image')
    //     ->orderByDesc('id')
    //     ->when($page != null, function($query) use ($page){
    //         $query->offset($page * self::LIMIT);
    //     })
    //     ->limit(self::LIMIT)
    //     ->get();
    // }

    public function getDetails($id)
    {
        return Product::where('id', $id)->with('category')->firstOrFail();
    }
    
    public function getAll()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->search()
                        ->orderByDesc('id')
                        ->paginate(12);
    }
    public function getProductNew()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('id')
                        ->limit(6)
                        ->get();
    }
    public function getProductSold()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->where('sold','>',0)
                        ->orderByDesc('sold')
                        ->limit(6)
                        ->get();
    }
    public function getProductSale()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->where('sale', '>', 0)
                        ->orderByDesc('sale')
                        ->limit(6)
                        ->get();
    }
    public function show()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
        ->orderByDesc('id')
        ->limit(8)
        ->get();
    }
    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
        ->where('id', '!=', $id)
        ->orderByDesc('id')
        ->limit(8)
        ->get();
    }
    public function productNew()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('id')
                        ->paginate(16);
    }
    public function productSold()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->where('sold','>',0)
                        ->orderByDesc('sold')                        
                        ->paginate(16);
    }
    public function productSale()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->where('sale', '>', 0)
                        ->orderByDesc('sale')
                        ->paginate(16);
    }
    public function getProduct_Category($id)
    {
        return Product::whereIn('category_id', $id)
                        ->select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('sale')
                        ->paginate(16);
    }
}