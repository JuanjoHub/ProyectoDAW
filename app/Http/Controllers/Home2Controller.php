<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home2Controller extends Controller
{
    public function show(Request $request){

      
        $texto = trim($request->input(key:'texto'));
        $articulos = Articulo::where('nombre_articulo','LIKE','%'.$texto.'%')
        ->orderBy('ventas_totales')
        ->paginate(6);
    
        return view('index2',['articulos' => $articulos] , ['texto' => $texto]);
        
        
      
    }
}
