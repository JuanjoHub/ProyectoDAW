<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function show(){

        return view('oftb_pedidos');
    }
}
