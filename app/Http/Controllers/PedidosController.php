<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function show(){

        $usuario=Auth::user()->username;
        $idUsuario=Auth::user()->id;

        

        $users = DB::table('historial')
        ->join('users', 'historial.id', '=', 'users.id')
        ->join('pedidos', 'historial.cod_pedido', '=', 'pedidos.cod_pedido')
        ->select('historial.fecha_pedido', 'historial.cod_pedido', 'pedidos.total','pedidos.estado')
        ->where('username',$usuario)
        ->get();

        // dd($users);

        $codigos = DB::table('historial')
        ->select('cod_pedido')
        ->get();

        $contenido = DB::table('facturas')
        ->join('historial', 'facturas.cod_pedido', '=', 'historial.cod_pedido')
        ->join('articulos', 'facturas.cod_articulo', '=', 'articulos.cod_articulo')
        ->select('articulos.nombre_articulo', 'facturas.cantidad', 'articulos.precio')
        ->where('historial.id',$idUsuario)
        // ->where('historial.cod_pedido','=','facturas.cod_pedido')
        
        // ->where('facturas.cod_pedido','historial.cod_pedido')
        ->get();


        return view('oftb_pedidos',['mispedidos' => $users],['miscontenidos' => $contenido]);
    }

    
}
