<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table = "Historial";
    protected $fillable = [

        'id',
        'pedido_id',
        'fecha_pedido',
        'fecha_prev_envio',
        
    ];

}
