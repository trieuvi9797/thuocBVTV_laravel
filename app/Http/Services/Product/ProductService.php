<?php


namespace App\Http\Services\Product;

use App\Models\Category;
use App\Models\Product;

class ProductService
{
    const LIMIT = 12;

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

    public function getAll()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('id')
                        ->paginate(16);
    }
    public function getProductNew()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('id')
                        ->get();
    }
    public function getProductSold()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->orderByDesc('sold')
                        ->get();
    }
    public function getProductSale()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
                        ->where('sale', '>', 0)
                        ->orderByDesc('sale')
                        ->get();
    }
    public function show()
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
        ->orderByDesc('id')
        ->limit(self::LIMIT)
        ->get();
    }

}