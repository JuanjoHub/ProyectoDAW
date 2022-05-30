<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    public function show(Request $request){

        $producto = $request->input(key:'cod_pago'); //ok
        $user = Auth::user()->username;
        $orders = DB::table('carts')
            ->select('price')
            ->where('username',$user)
            ->groupBy('price')
            ->get();
        $totalOrders = (float)$orders->sum('price');       
        

        if (Auth::check()) {
            return view('oftb_pago',['cod_pago' => $producto, 'total' => $totalOrders]);
        } else {
            return view('Authenticated.oftb_login');
        }
        
        
    }

}
