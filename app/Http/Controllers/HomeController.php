<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class HomeController extends Controller
{
    public function __invoke(){
        $data = Articulo::all();
        return view('index',['datos' => $data]);
    }

    

}