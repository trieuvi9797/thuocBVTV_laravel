<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'category_id', 'id');
    }
}
