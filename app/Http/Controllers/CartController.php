<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){

       $producto = Articulo::findOrFail($request->input(key:'cod_articulo')); //key hace referencia al name que tiene el imput
       Cart::add(
           $producto->cod_articulo, 
           $producto->nombre_articulo, 
           $request->input(key:'quantity'),
           $producto->precio / 100,
        
        );

        return redirect()->to('Peliculas/{saga_peliculas}');
    }
}
