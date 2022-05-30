<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function show()
    {

        $usuario = Auth::user()->username;
        $idUsuario = Auth::user()->id;
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();


        $users = DB::table('historial')
            ->join('users', 'historial.id', '=', 'users.id')
            ->join('pedidos', 'historial.pedido_id', '=', 'pedidos.pedido_id')
            ->select('historial.fecha_pedido', 'historial.pedido_id', 'pedidos.estado')
            ->where('username', $usuario)
            ->paginate(5);


        return view('Orders.oftb_pedidos', ['mispedidos' => $users , 'quantityCard' => $count]);
    }
}
