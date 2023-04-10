<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'bill_active_id',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    
    public function BillActive()
    {
        return $this->belongsTo(BillActive::class, 'bill_active_id', 'id');
    }
    
    public function BillDetail()
    {
        return $this->belongsTo(BillDetail::class, 'bill_id', 'id');
    }
}
