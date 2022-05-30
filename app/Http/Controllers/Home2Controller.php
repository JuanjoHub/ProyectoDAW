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

      
        $texto = trim($request->input(key:'texto'));
        $articulos = Articulo::where('nombre_articulo','LIKE','%'.$texto.'%')
        ->orderBy('ventas_totales')
        ->paginate(200);
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();

    
        return view('index2',['articulos' => $articulos,'texto' => $texto, 'quantityCard' => $count]);
        
        
      
    }
}
