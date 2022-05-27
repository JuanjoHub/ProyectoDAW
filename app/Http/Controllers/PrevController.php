<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrevController extends Controller
{
    public function prev_Articulo(Request $request){

        $producto = $request->input(key:'cod_articulo');
        // dd($producto);

        $preview = DB::table('articulos')
        ->select('nombre_articulo','descripcion','precio','imagen','stock','cod_articulo')
        ->where('cod_articulo',$producto)
        ->get();

        if (Auth::check()) {
            $user = Auth::user();
            $count = Cart::where('username',$user->username)->count();
            return view('/oftb_prev_prod', ['preview' => $preview, 'quantityCard' => $count]); 
           }
 
         return view('/oftb_prev_prod', ['preview' => $preview]);
     }
}
