<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Home2Controller extends Controller
{
    public function show(Request $request){

        $user = Auth::user();
        $texto = trim($request->input(key:'texto'));
        $articulos = Articulo::where('nombre_articulo','LIKE','%'.$texto.'%')
        ->orderBy('ventas_totales')
        ->paginate(200);
        
        if (Auth::check()) {
        $count = Cart::where('username',$user->username)->count();
        return view('index2',['articulos' => $articulos,'texto' => $texto, 'quantityCard' => $count]);
        
        }
        return view('index2',['articulos' => $articulos,'texto' => $texto]);
    }
}
