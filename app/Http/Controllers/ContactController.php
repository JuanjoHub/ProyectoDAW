<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    
    public function show() {

    
        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();
        // dd($cartDetails);
    
         return view('oftb_contacto', ['quantityCard' => $count]); 

    }
}
