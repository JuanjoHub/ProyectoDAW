<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideojuegosController extends Controller
{
    public function selectJuegos($saga_juego)
    {
        $url = "Videojuegos.oftb_juegos_";
        $dmc = Articulo::where('cod_categoria','=','9')->paginate(3);
        $gow = Articulo::where('cod_categoria','=','10')->paginate(3);
        $mk = Articulo::where('cod_categoria','=','11')->paginate(3);
        $re = Articulo::where('cod_categoria','=','12')->paginate(3);
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();

        switch ($saga_juego) {
            case 'dmc': return view($url . $saga_juego, ['saga_juego' => $saga_juego, 'articulo_juegos' => $dmc, 'quantityCard' => $count]);
            case 'gow': return view($url . $saga_juego, ['saga_juego' => $saga_juego, 'articulo_juegos' => $gow, 'quantityCard' => $count]);
            case 'mk':  return view($url . $saga_juego, ['saga_juego' => $saga_juego, 'articulo_juegos' => $mk, 'quantityCard' => $count]);
            case 're':  return view($url . $saga_juego, ['saga_juego' => $saga_juego, 'articulo_juegos' => $re, 'quantityCard' => $count]);
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_juego,y pasarselo a la vista en la linea 20
                como un array */
               
                break;
        default:
                return view('/home');
                break;
        }
    }

    public function search($saga_juego,Request $request){

        $url = "Videojuegos.oftb_juegos_";

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
        
         
            // return redirect()->to('/Peliculas/marvel');
            switch ($saga_juego) {
                case 'dmc':  return view($url . $saga_juego, ['saga_juego' => $saga_juego,'articulo_juegos' => $articulos,'quantityCard' => $count]);
                case 'gow':  return view($url . $saga_juego, ['saga_juego' => $saga_juego,'articulo_juegos' => $articulos,'quantityCard' => $count]);
                case 'mk':   return view($url . $saga_juego, ['saga_juego' => $saga_juego,'articulo_juegos' => $articulos,'quantityCard' => $count]);
                case 're':   return view($url . $saga_juego, ['saga_juego' => $saga_juego,'articulo_juegos' => $articulos,'quantityCard' => $count]);
                    /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_juego,y pasarselo a la vista en la linea 20
                    como un array */
                    // return view($url . $saga_juego, ['nombre' => $saga_juego],['articulo_peliculas' => $marvel]);
                    break;
            default:
                    return view('/home');
                    break;
            }

        
        // else
        //  return view('Peliculas/dc',['articulo_peliculas' => $articulos]);
    }
}
