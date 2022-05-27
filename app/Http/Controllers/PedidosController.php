<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function show()
    {

        $usuario = Auth::user()->username;
        $idUsuario = Auth::user()->id;



        $users = DB::table('historial')
            ->join('users', 'historial.id', '=', 'users.id')
            ->join('pedidos', 'historial.pedido_id', '=', 'pedidos.pedido_id')
            ->select('historial.fecha_pedido', 'historial.pedido_id', 'pedidos.estado')
            ->where('username', $usuario)
            ->paginate(10);


        return view('Orders.oftb_pedidos', ['mispedidos' => $users]);
    }
}
