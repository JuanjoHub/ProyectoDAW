<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class SeriesController extends Controller
{
    public function selectSeries($saga_serie)
    {
        $url = "Series.oftb_series_";
        $articulo = Articulo::all();

        switch ($saga_serie) {
            case 'got':
            case 'peakyblinders':
            case 'theboys':
            case 'walkingdead':
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_serie,y pasarselo a la vista en la linea 20
                como un array */
                return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $articulo]);
                break;
        default:
                return view('home');
                break;
        }
    }
}
