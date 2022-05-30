<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{

    public function selectfranquicia($saga_peliculas)
    {
        $url = "Peliculas.oftb_peliculas_";
        $dc = Articulo::where('cod_categoria', '=', '1')->paginate(3);
        $marvel = Articulo::where('cod_categoria', '=', '2')->paginate(3);
        $esdla = Articulo::where('cod_categoria', '=', '3')->paginate(3);
        $starwars = Articulo::where('cod_categoria', '=', '4')->paginate(3);
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();

        // return prueba($saga_peliculas, $esdla, $starwars, $marvel, $dc);

        switch ($saga_peliculas) {
            case 'esdla':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $esdla, 'quantityCard' => $count ]);
            case 'starwars':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $starwars, 'quantityCard' => $count]);
            case 'marvel':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $marvel, 'quantityCard' => $count]);
            case 'dc':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $dc, 'quantityCard' => $count]);
                
                break;
            default:
                return view('/home');
                break;
        }
    }

    public function search($saga_peliculas, Request $request)
    {

        $url = "Peliculas.oftb_peliculas_";

        $texto = trim($request->input(key: 'texto'));

        $articulos = Articulo::where('nombre_articulo', 'LIKE', '%' . $texto . '%')
            ->orderBy('ventas_totales')
            ->paginate(200);
            
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')->select('id','product_title','quantity','price')
                                       ->where('username', $user->username)
                                       ->get();

        // return prueba($saga_peliculas, $articulos, $articulos, $articulos, $articulos);

        // return redirect()->to('/Peliculas/marvel');
        switch ($saga_peliculas) {
            case 'esdla':       return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
            case 'starwars':    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
            case 'marvel':      return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
            case 'dc':          return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
        /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_peliculas,y pasarselo a la vista en la linea 20
                    como un array */
        // return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $marvel]);
        //         break;
        default:
                return view('/home');
                break;
        }


        // else
        //  return view('Peliculas/dc',['articulo_peliculas' => $articulos]);
    }

    // function prueba($saga_peliculas, $esdla, $starwars, $marvel, $dc) {

    //     $url = "Peliculas.oftb_peliculas_";

    //     switch ($saga_peliculas) {
    //         case 'esdla':
    //             return view($url . $saga_peliculas, ['nombre' => $saga_peliculas], ['articulo_peliculas' => $esdla]);
    //         case 'starwars':
    //             return view($url . $saga_peliculas, ['nombre' => $saga_peliculas], ['articulo_peliculas' => $starwars]);
    //         case 'marvel':
    //             return view($url . $saga_peliculas, ['nombre' => $saga_peliculas], ['articulo_peliculas' => $marvel]);
    //         case 'dc':
    //             return view($url . $saga_peliculas, ['nombre' => $saga_peliculas], ['articulo_peliculas' => $dc]);
    //             /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_peliculas,y pasarselo a la vista en la linea 20
    //             como un array */
    //             // return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $marvel]);
    //             break;
    //         default:
    //             return view('/home');
    //             break;
    //     }
    // }
}



