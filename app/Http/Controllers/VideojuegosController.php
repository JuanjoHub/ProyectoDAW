<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
class VideojuegosController extends Controller
{
    public function selectJuegos($saga_juego)
    {
        $url = "Videojuegos.oftb_juegos_";
        $articulo = Articulo::all();

        switch ($saga_juego) {
            case 'dmc':
            case 'gow':
            case 'mk':
            case 're':
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_juego,y pasarselo a la vista en la linea 20
                como un array */
                return view($url . $saga_juego, ['saga_juego' => $saga_juego],['articulo_juegos' => $articulo]);
                break;
        default:
                return view('home');
                break;
        }
    }
}
