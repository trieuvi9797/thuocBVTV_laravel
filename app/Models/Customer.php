<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'phone',
        'email',
        'address',
        'note'
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
