<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Historial;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PagoReadyController extends Controller
{


    public function pago(Request $request)
    {

        $producto = $request->input(key: 'cod_pago');
        $nombre = trim($request->input(key: 'nombre'));
        $direccion = trim($request->input(key: 'direccion'));
        $ccaa = $request->input(key: 'ccaa');
        $metodo = $request->input(key: 'metodo');
        $tarjeta = $request->input(key: 'tarjeta');
        $titular = trim($request->input(key: 'titular'));
        $month = $request->input(key: 'month');
        $cvc = $request->input(key: 'cvc');
        $idUsuario = Auth::user()->id;

        /* Formateamos los datos que vamos a insertar en la BBDD */
        $bd_card = substr($tarjeta, 15, 19);
        $current_date = date("Y-m-d");
        $current_arrive = date("Y-m-d", strtotime($current_date . "+ 7 days"));

        // dd( $current_date,$current_arrive);
        /*Select para pasar los datos del producto a la pagina final */
        $resume = DB::table('articulos')
            ->select('nombre_articulo', 'precio', 'imagen')
            ->where('cod_articulo', $producto)
            ->get();
       
       

        if ( comprobarTarjeta($tarjeta) && comprobarTitular($titular, $nombre) && comprobarRadio($metodo)
            && comprobarCaducidad($month) && comprobarCCAA($ccaa) && comprobarCVC($cvc)) {

            $orderId = Pedido::insertGetId([
                'nombre_destinatario' => $nombre,
                'metodo_pago' => $metodo,
                'numero_tarjeta' => $bd_card,
                'CCAA' =>  $ccaa,
                'direccion_envio' => $direccion,
                'estado' => 'Send'

            ]);

            if ($orderId) {

                Historial::insert([

                    'id' => $idUsuario,
                    'pedido_id' => $orderId,
                    'fecha_pedido' => $current_date,
                    'fecha_prev_envio' =>  $current_arrive

                ]);

                Factura::insert([

                    'pedido_id' => (int)$orderId,
                    'cod_articulo' => (int)$producto,
                    'cantidad' => (int)'1',

                ]);
            }


            return view('test', ['resume' => $resume]);
            // return redirect()->to('/test');
        }

        return redirect()->to('/pago');
        // dd($caducidad);
        // return comprobarCVC($cvc) ? redirect()->to('/test') : redirect()->to('/pago');
    }
}
/* Codigo postal : ^d{5}(?:[-s]d{4})?$ */
/* Telefono español: /^\+?(6\d{2}|7[1-9]\d{1})\d{6}$
/ */
/* Comprobamos la tarjeta  */
function comprobarTarjeta($tarjeta)
{

    /*^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35d{3})d{11})$ */
    $regex = "/^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$/";

    return preg_match($regex, $tarjeta);
}

/* Comprobamos nombre del destinatario y el titular de la tarjeta  */
function comprobarTitular($titular, $nombre)
{

    $boolean = false;
    // $regex = "/^[a-z ,.'-]+$/i";
    $regex = "^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)^";
    if (preg_match($regex, $titular) &&  preg_match($regex, $nombre)) {
        $boolean = true;
    }

    return $boolean;
}


function comprobarRadio($radio)
{

    $boolean = true;

    if ($radio == null) {
        $boolean = false;
    }

    return $boolean;
}

function comprobarCaducidad($month)
{

    // $regex = "(((0[123456789]|10|11|12)/(([1][9][0-9][0-9])|([2][0-9][0-9][0-9]))))";
    $check = false;

    $form_month = (int)$month;
    $current_month = (int)date("m");
    $month_resume = $form_month - $current_month;

    if ($month_resume > 0) {
        $check = true;
    }


    return $check;
}

function comprobarCCAA($ccaa)
{

    $check = true;
    if ($ccaa == "Comunidad Autonoma") {
        $check = false;
    }
    return $check;
}

function comprobarCVC($cvc)
{
    // "/^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$/"
    $regex = "/^[0-9]{3}$/";
    return preg_match($regex, $cvc);
}
