<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{

    public function selectfranquicia($saga_peliculas)
    {
        $url = "Peliculas.oftb_peliculas_";
         $dc = Articulo::where('cod_categoria','=','1')->paginate(3);
         $marvel = Articulo::where('cod_categoria','=','2')->paginate(3);
         $esdla = Articulo::where('cod_categoria','=','3')->paginate(3);
         $starwars = Articulo::where('cod_categoria','=','4')->paginate(3);

        // $articulo = DB::table('articulos')
        // ->select('nombre_articulo','precio','imagen','cod_categoria','cod_articulo')
        // ->paginate(15);
        
        

        switch ($saga_peliculas) {
            case 'esdla':return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $esdla]);
            case 'starwars':return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $starwars]);
            case 'marvel':return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $marvel]);
            case 'dc':return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $dc]);
                /*Crear funcion que me devuelva las peliculas que vengan de la variable saga_peliculas,y pasarselo a la vista en la linea 20
                como un array */
                // return view($url . $saga_peliculas, ['nombre' => $saga_peliculas],['articulo_peliculas' => $marvel]);
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