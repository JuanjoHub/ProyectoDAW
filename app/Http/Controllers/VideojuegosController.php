<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
class VideojuegosController extends Controller
{
    public function selectJuegos($saga_juego)
    {
        $url = "Videojuegos.oftb_juegos_";
        $dmc = Articulo::where('cod_categoria','=','9')->paginate(3);
        $gow = Articulo::where('cod_categoria','=','10')->paginate(3);
        $mk = Articulo::where('cod_categoria','=','11')->paginate(3);
        $re = Articulo::where('cod_categoria','=','12')->paginate(3);

        switch ($saga_juego) {
            case 'dmc': return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $dmc]);
            case 'gow': return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $gow]);
            case 'mk':  return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $mk]);
            case 're':  return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $re]);
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
         ->paginate(6);

        
         
            // return redirect()->to('/Peliculas/marvel');
            switch ($saga_juego) {
                case 'dmc':       return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $articulos]);
                case 'gow':    return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $articulos]);
                case 'mk':      return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $articulos]);
                case 're':          return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $articulos]);
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
