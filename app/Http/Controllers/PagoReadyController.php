<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $request->flash(); //Variable que necesitamos para repintar los campos del formulario
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
        $user = Auth::user()->username;
        /* Formateamos los datos que vamos a insertar en la BBDD */
        $bd_card = substr($tarjeta, 15, 19);
        $current_date = date("Y-m-d");
        $current_arrive = date("Y-m-d", strtotime($current_date . "+ 7 days"));
        $count = Cart::where('username', $user)->count();

        // dd( $current_date,$current_arrive);
        /*Select para pasar los datos del producto a la pagina final */
        $resume = DB::table('articulos')
            ->select('nombre_articulo', 'precio', 'imagen')
            ->where('cod_articulo', $producto)
            ->get();
        //Carrito
        $cartDetails = DB::table('carts')
            ->select('id', 'product_title', 'quantity', 'price', 'code')
            ->where('username', $user)
            ->get();

        $lastPage = $cartDetails;
        /* Precio total de los productos del carrito */
        $orders = DB::table('carts')
            ->select('price')
            ->where('username', $user)
            ->groupBy('price')
            ->get();
        $totalOrders = (float)$orders->sum('price');
        // dd($totalOrders);  


        if (
            comprobarTarjeta($tarjeta) && comprobarTitular($titular, $nombre) && comprobarRadio($metodo)
            && comprobarCaducidad($month) && comprobarCCAA($ccaa) && comprobarCVC($cvc) &&  $cartDetails->isNotEmpty()
        ) {

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

                foreach ($cartDetails as $details) {
                    # code...

                    Factura::insert([

                        'pedido_id' => (int)$orderId,
                        'cod_articulo' => (int)$details->code,
                        'cantidad' => (int)$details->quantity,

                    ]);
                }
                //Borramos el carrito de la BBDD
                $deleted = DB::table('carts')->where('username', '=', $user)->delete();
                $count = 0;


                return view('exito_pago', ['resume' => $resume, 'quantityCard' => $count, 'orderResume' => $lastPage, 'total' => $totalOrders]);
            }
            // return redirect()->to('/test');
        }

        $validator = comprobarMsg($request);

        return redirect()->to('/pago')->withErrors($validator);
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
function comprobarTitular($titular)
{

    $boolean = false;
    // $regex = "/^[a-z ,.'-]+$/i";
    $regex = "^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)^";
    if (preg_match($regex, $titular)) {
        $boolean = true;
    }

    return $boolean;
}

function comprobarNombre($nombre)
{

    $boolean = false;
    // $regex = "/^[a-z ,.'-]+$/i";
    $regex = "^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)^";
    if (preg_match($regex, $nombre)) {
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
    if ($ccaa == "Region") {
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

function comprobarDireccion($direccion){
    $address = false;
    if($direccion =="" || $direccion == null) {
        $address = true;
    }
    return $address;
}

//Funcion para generar los mensajes de error de la pagina de pago
function comprobarMsg(Request $request) {

    $nombre = trim($request->input(key: 'nombre'));
    $ccaa = $request->input(key: 'ccaa');
    $metodo = $request->input(key: 'metodo');
    $tarjeta = $request->input(key: 'tarjeta');
    $titular = trim($request->input(key: 'titular'));
    $month = $request->input(key: 'month');
    $cvc = $request->input(key: 'cvc');
    $direccion = trim($request->input(key: 'direccion'));
    $errores[] = "";


    if (!comprobarTarjeta($tarjeta)) {

        $errores[] = "The field Card Number is invalid or is empty";
    }
    if (!comprobarTitular($titular)) {

        $errores[] = "The field Card Holder is invalid or is empty";
    }
    if (!comprobarTitular($nombre)) {

        $errores[] = "The field Name is invalid or is empty";
    }
    if (!comprobarRadio($metodo)) {
        $errores[] = "The field Payment Method is obligatory";
    }
    if (!comprobarCCAA($ccaa)) {
        $errores[] = "The field Region is obligatory";
    }
    if (!comprobarCaducidad($month)) {
        $errores[] = "The card is expired";
    }
    if (!comprobarCVC($cvc)) {
        $errores[] = "The CVC format is invalid";
    }
    if (comprobarDireccion($direccion)) {
        $errores[] = "The field Address cannot be empty";
    }

    return $errores;
} 
