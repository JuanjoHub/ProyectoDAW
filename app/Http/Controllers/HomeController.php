<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(){

      
        $artMV = DB::select('select * from articulos order by ventas_totales desc LIMIT 6 ');
        $novedades = DB::select('select * from articulos order by fecha_insercion desc LIMIT 6 ');

     
     
        return view('index',['masvendidos' => $artMV], ['novedades' => $novedades]);
    }
}