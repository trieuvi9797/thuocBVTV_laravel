<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'image',
        'description',
        'description_short'
    ];
    public function scopeSearch($query) //them localScope
    {
        if($key = request()->key){
            $query = $query->where('title', 'like', '%'.$key.'%');
        }
        return $query;
    }//globalScope

}
