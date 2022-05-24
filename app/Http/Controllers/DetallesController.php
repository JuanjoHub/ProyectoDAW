<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetallesController extends Controller
{
    public function show(Request $request)
    {

        $pedido = $request->input(key: 'cod_pedido');
        $idUsuario = Auth::user()->id;

        $detalles = DB::table('facturas')
            ->join('historial', 'facturas.cod_pedido', '=', 'historial.cod_pedido')
            ->join('articulos', 'facturas.cod_articulo', '=', 'articulos.cod_articulo')
            ->select('articulos.nombre_articulo', 'facturas.cantidad', 'articulos.precio', 'facturas.cod_pedido')
            ->where([
                ['historial.id', '=', $idUsuario],
                ['historial.cod_pedido', '=', $pedido],
            ])->get();


        $detalles_pedido = DB::table('pedidos')
            ->join('historial', 'pedidos.cod_pedido', '=', 'historial.cod_pedido')
            ->select('pedidos.cod_pedido', 
                     'pedidos.nombre_destinatario', 
                     'pedidos.metodo_pago', 
                     'pedidos.numero_tarjeta', 
                     'pedidos.CCAA', 
                     'pedidos.direccion_envio', 
                     'pedidos.estado',
                     'historial.fecha_pedido',
                     'historial.fecha_prev_envio')
            ->where([
                ['historial.id', '=', $idUsuario],
                ['historial.cod_pedido', '=', $pedido],
            ])->get();

        return view('Orders.detalle_pedido', ['detalles' => $detalles], ['dameDatos' => $detalles_pedido]);
    }
}
