<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;


    protected $fillable = [
        'cod_articulo',
        'cod_categoria',
        'tipo',
        'nombre_articulo',
        'descripcion',
        'stock',
        'precio',
        'ventas_totales',
    ];
}
