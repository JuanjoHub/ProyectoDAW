<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    public function show(Request $request){

        $producto = $request->input(key:'cod_pago');
        
        return view('oftb_pago',['cod_pago' => $producto]);
        
    }

}
