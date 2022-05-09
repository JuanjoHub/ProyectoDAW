<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideojuegosController extends Controller
{
    public function selectJuego($saga_juego)
    {
        $url = "Videojuegos.oftb_juegos_";

        switch ($saga_juego) {
            case 'dmc':
            case 'gow':
            case 'mk':
            case 're':
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_juego,y pasarselo a la vista en la linea 20
                como un array */
                return view($url . $saga_juego, ['saga_juego' => $saga_juego]);
                break;
        default:
                return view('home');
                break;
        }
    }
}
