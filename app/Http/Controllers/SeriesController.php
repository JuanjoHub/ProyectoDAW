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
            case 'got':             return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $got]);
            case 'peakyblinders':   return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $pk]);
            case 'theboys':         return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $tb]);
            case 'walkingdead':     return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $wd]);
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

         $articulos = Articulo::where('nombre_articulo','LIKE','%'.$texto.'%')
        ->orderBy('ventas_totales')
         ->paginate(6);

            // return redirect()->to('/Peliculas/marvel');
            switch ($saga_serie) {
                case 'got':              return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $articulos]);
                case 'peakyblinders':    return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $articulos]);
                case 'theboys':          return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $articulos]);
                case 'walkingdead':      return view($url . $saga_serie, ['saga_serie' => $saga_serie],['articulo_series' => $articulos]);
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
