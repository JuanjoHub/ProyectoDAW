<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
class PeliculasController extends Controller
{

    public function selectfranquicia($saga_peliculas)
    {
        $url = "Peliculas.oftb_peliculas_";
        $articulo = Articulo::all();
        

        switch ($saga_peliculas) {
            case 'esdla':
            case 'starwars':
            case 'marvel':
            case 'dc':
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_peliculas,y pasarselo a la vista en la linea 20
                como un array */
                return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $articulo]);
                break;
        default:
                return view('/home');
                break;
        }
    }


   

    
}


/*

  public function dc ($nombre){
        return view('Peliculas.oftb_peliculas_dc', ['nombre' => $nombre]);
    }
    
*/

/*
        $aa = [0 => ['img' => 'pelicula1','title' => 'Pelicula 1','description' => 'Descripcion de la pelicula 1','precio' => '10',],     
                1 => ['img' => 'pelicula2','title' => 'Pelicula 2','description' => 'Descripcion de la pelicula 2','precio' => '20',],     
                2 => ['img' => 'pelicula3','title' => 'Pelicula 3','description' => 'Descripcion de la pelicula 3','precio' => '30',],     
                3 => ['img' => 'pelicula4','title' => 'Pelicula 4','description' => 'Descripcion de la pelicula 4','precio' => '40',]];
                dd($aa);
*/