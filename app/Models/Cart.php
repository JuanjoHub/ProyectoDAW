<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

     /* Metodo que proporciona laravel para en el que indicamos que campos va a rellenar cuando añadimos un objeto carrito */
     /* Cuando se intente guardar un registro, Laravel lo va a comparar cone estas propiedades para saber que es lo que tiene que insertar 
     a la base de datos y que no*/
    protected $fillable = [
        'username',
        'code',
        'phone',
        'address',
        'product_title',
        'quantity',
        'price',
    ];

}
