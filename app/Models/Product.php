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
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault(['name' => '']);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault(['name' => '']);
    }

    public function scopeSearch($query) //them localScope
    {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }//globalScope

    
    public function BillDetail()
    {
        return $this->hasMany(BillDetail::class, 'product_id', 'id');
    }
}   
