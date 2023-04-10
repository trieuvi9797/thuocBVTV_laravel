<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function Bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }
    
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
