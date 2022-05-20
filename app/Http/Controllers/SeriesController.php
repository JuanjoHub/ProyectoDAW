<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class SeriesController extends Controller
{
    public function selectSeries($saga_serie)
    {
        $url = "Series.oftb_series_";
        $got = Articulo::where('cod_categoria','=','5')->paginate(3);
        $pk = Articulo::where('cod_categoria','=','6')->paginate(3);
        $tb = Articulo::where('cod_categoria','=','7')->paginate(3);
        $wd = Articulo::where('cod_categoria','=','8')->paginate(3);


        switch ($saga_serie) {
            case 'got': return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $got]);
            case 'peakyblinders': return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $pk]);
            case 'theboys': return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $tb]);
            case 'walkingdead': return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $wd]);
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_serie,y pasarselo a la vista en la linea 20
                como un array */
               
                break;
        default:
                return view('home');
                break;
        }
    }
}
