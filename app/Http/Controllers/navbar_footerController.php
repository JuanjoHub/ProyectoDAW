<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class navbar_footerController extends Controller
{
    public function dameCategorias(){
    $categories = DB::select('select * from categorias');
    return view('navbar_footer',['miscategorias' => $categories]);

    }
}
