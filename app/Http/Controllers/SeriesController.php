<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function selectSeries($saga_serie)
    {
        $url = "Series.oftb_series_";
        $got = Articulo::where('cod_categoria','=','5')->paginate(3);
        $pk = Articulo::where('cod_categoria','=','6')->paginate(3);
        $tb = Articulo::where('cod_categoria','=','7')->paginate(3);
        $wd = Articulo::where('cod_categoria','=','8')->paginate(3);
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();

        switch ($saga_serie) {
            case 'got':             return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $got,'quantityCard' => $count]);
            case 'peakyblinders':   return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $pk, 'quantityCard' => $count]);
            case 'theboys':         return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $tb, 'quantityCard' => $count]);
            case 'walkingdead':     return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $wd, 'quantityCard' => $count]);
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_serie,y pasarselo a la vista en la linea 20
                como un array */
               
                break;
        default:
                return view('home');
                break;
        }
    }

    public function search($saga_serie,Request $request){

        $url = "Series.oftb_series_";

        $texto = trim($request->input(key:'texto'));

        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();

         $articulos = Articulo::where('nombre_articulo','LIKE','%'.$texto.'%')
        ->orderBy('ventas_totales')
         ->paginate(200);

            // return redirect()->to('/Peliculas/marvel');
            switch ($saga_serie) {
                case 'got':              return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'peakyblinders':    return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'theboys':          return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                case 'walkingdead':      return view($url . $saga_serie, ['saga_serie' => $saga_serie, 'articulo_series' => $articulos, 'quantityCard' => $count]);
                    /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_peliculas,y pasarselo a la vista en la linea 20
                    como un array */
                    // return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $marvel]);
                    break;
            default:
                    return view('/home');
                    break;
            }

        
        // else
        //  return view('Peliculas/dc',['articulo_peliculas' => $articulos]);
    }
}
