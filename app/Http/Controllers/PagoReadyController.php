<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PagoReadyController extends Controller {

    public function pago(Request $request) {

        // $producto = $request->input(key: 'cod_pago');
        $nombre = trim($request->input(key: 'nombre'));
        $direccion = trim($request->input(key: 'direccion'));
        $ccaa = $request->input(key: 'ccaa');
        $metodo = $request->input(key: 'metodo');
        $tarjeta = $request->input(key: 'tarjeta');
        $titular = trim($request->input(key: 'titular'));
        $example = $request->input(key: 'exampleRadios');
        $caducidad = $request->input(key: 'caducidad');

        // dd($caducidad);
        return comprobarCaducidad($caducidad) ? redirect()->to('/test') : redirect()->to('/pago');
    }
}

/* Comprobamos la tarjeta  */
function comprobarTarjeta($tarjeta) {

    $regex = "/^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$/";

    return preg_match($regex, $tarjeta);
}
/* Comprobamos el titular de la tarjeta  */

function comprobarTitular($titular) {

    // $regex = "/^[a-z ,.'-]+$/i";
    $regex = "^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)^";
    return preg_match($regex, $titular);
}

function comprobarRadio($radio) {

    $boolean = true;

    if ($radio == null) {
        $boolean = false;
    }

    return $boolean;
}


function comprobarCaducidad($caducidad) {

    $regex = "(((0[123456789]|10|11|12)/(([1][9][0-9][0-9])|([2][0-9][0-9][0-9]))))";
    preg_match($regex, $caducidad); //0 false 1 true
    $check=false;

    if (preg_match($regex, $caducidad)) {

        $caducidad = substr($caducidad,3,7);
        $year = (int)$caducidad;
        $current_year=(int)date("Y");
        $total=$year-$current_year ;
        
            if($total == 0 || $total > 0 ){
                $check=true;
            }
    }

    return $check;
}