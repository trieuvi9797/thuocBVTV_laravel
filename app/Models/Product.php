<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'category_id',
        'price',
        'sale',
        'quantity'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
