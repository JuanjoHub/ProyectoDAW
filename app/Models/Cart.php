<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        // 'id',
        'username',
        'code',
        'phone',
        'address',
        'product_title',
        'quantity',
        'price',
    ];

}
