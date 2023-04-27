<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'active',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
        
    public function BillDetail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }
    
    // public function scopeSearch($query) //them localScope
    // {
    //     if($key = request()->key){
    //         $query = $query->where('name', 'like', '%'.$key.'%');
    //     }
    //     return $query;
    // }//globalScope
}
