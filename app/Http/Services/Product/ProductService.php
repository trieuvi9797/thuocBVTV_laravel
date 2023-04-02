<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService
{
    const LIMIT = 12;

    public function get($page = null)
    {
        return Product::select('id', 'name', 'price', 'sale', 'image')
        ->orderByDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
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