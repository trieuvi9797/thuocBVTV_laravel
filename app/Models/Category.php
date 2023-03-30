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
    
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function childrents(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function getParentNameAttribute(){
        return optional($this->parent)->name;
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
