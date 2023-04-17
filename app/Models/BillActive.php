<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillActive extends Model
{
    use HasFactory;
    protected $fillable = [
        'active'
    ];
    public function Bill()
    {
        return $this->hasMany(Bill::class, 'bill_active_id', 'id');
    }
}
