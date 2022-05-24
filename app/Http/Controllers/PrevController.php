<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
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
 
         return view('/oftb_prev_prod', ['preview' => $preview]);
     }
}
