<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPage extends Model
{
    use HasFactory;

    protected $fillable = [ 'logo', 'phone', 'address', 'email', 'contentFirst', 'facebook', 'instagram', 'twitter', 'telegram'];
    
}
