<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(){

      

       //Query para seleccionar los ultimos 6 articulos
       $novedades = DB::select('select * from articulos order by fecha_insercion desc LIMIT 6 ');
       //Query para seleccionar los 6 articulos mas vendidos
       $artMV = DB::select('select * from articulos order by ventas_totales desc LIMIT 6 ');
       //Query para saber el numero de productos que tiene en el carrito
  
        
       if (Auth::check()) {
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        return view('index',['articulos_a' => $novedades, 'articulos_b' => $artMV , 'quantityCard' => $count]); 
       }
      
        return view('index',['articulos_a' => $novedades, 'articulos_b' => $artMV ]); 
         
    }

    

    
}