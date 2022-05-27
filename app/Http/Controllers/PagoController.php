<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    public function show(Request $request){

        $producto = $request->input(key:'cod_pago'); //ok
        

        if (Auth::check()) {
            return view('oftb_pago',['cod_pago' => $producto]);
        } else {
            return view('Authenticated.oftb_login');
        }
        
        
    }

}
