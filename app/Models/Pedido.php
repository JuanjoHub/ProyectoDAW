<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    use HasFactory;


    // 'nombre_destinatario' => $nombre ,
    // 'metodo_pago' => $metodo,
    // 'numero_tarjeta' => $bd_card,
    // 'CCAA' =>  $ccaa,
    // 'direccion_envio' => $direccion,
    // 'estado' => 'Send'


    protected $fillable = [
        'nombre_destinatario',
        'metodo_pago',
        'numero_tarjeta',
        'CCAA',
        'direccion_envio',
        'estado',
    ];


}
