<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


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


        //Si el usuario esta logeado se mostrara la vista con el navbar correspondiente al usuario con su carrito y su nombre
        if (Auth::check()) {
            $count = Cart::where('username', $user->username)->count();
            switch ($saga_peliculas) {
                case 'esdla':
                    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $esdla, 'quantityCard' => $count]);
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
        //Si no esta logeado se mostrara la vista perteneciente a la categoria con el navbar standard
        switch ($saga_peliculas) {
            case 'esdla':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $esdla]);
            case 'starwars':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $starwars]);
            case 'marvel':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $marvel]);
            case 'dc':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $dc]);

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

        //Si el usuario esta logeado se mostrar el resultaod de la busqueda con el navbar correspondiente al cliente con su carrito y su nombre
        if (Auth::check()) {
            $count = Cart::where('username', $user->username)->count();
            switch ($saga_peliculas) {
                case 'esdla':
                    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
                case 'starwars':
                    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
                case 'marvel':
                    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
                case 'dc':
                    return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos, 'quantityCard' => $count]);
            
                default:
                    return view('/home');
                    break;
            }
        }
        //Si el usuario no esta logeado se mostrará la vista con el resultado de la busqueda con el navbar standard
        switch ($saga_peliculas) {
            case 'esdla':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos]);
            case 'starwars':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos]);
            case 'marvel':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos]);
            case 'dc':
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas, 'articulo_peliculas' => $articulos]);
                
            default:
                return view('/home');
                break;
        }
    }
}
