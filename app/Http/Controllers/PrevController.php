<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrevController extends Controller
{
    public function prev_Articulo(Request $request){

        //Variable en la que voy a guardar el input con el codigo del articulo que me llega del boton View Details
        $producto = $request->input(key:'cod_articulo');
        
        //Consulta en la que selecciono los campos que quiero mostrar, del producto seleccionado
        $preview = DB::table('articulos')
        ->select('nombre_articulo','descripcion','precio','imagen','stock','cod_articulo')
        ->where('cod_articulo',$producto)
        ->get();

        //Consulta para rellenar el div que contiene el nombre de la categoria, tipo de producto y el stock
        $category = DB::table('articulos')
        ->join('categorias', 'articulos.cod_categoria', '=', 'categorias.cod_categoria')
        ->select('categorias.categoria', 'categorias.nombre_categoria', 'articulos.tipo')
        ->where('cod_articulo',$producto)
        ->get();

        
        if (Auth::check()) {
            $user = Auth::user();
            $count = Cart::where('username',$user->username)->count();
            return view('/oftb_prev_prod', ['preview' => $preview, 'quantityCard' => $count, 'category'=>$category]); 
           }
 
         return view('/oftb_prev_prod', ['preview' => $preview, 'category'=>$category]);
     }
}
