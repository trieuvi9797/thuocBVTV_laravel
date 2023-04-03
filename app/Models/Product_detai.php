<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detai extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'view',
        'sold',
        'likes',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault([
            'view' => '',
            'sold' => '',
            'likes' => ''
        ]);
    }
}
