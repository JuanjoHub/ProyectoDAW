<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{


    public function show() {

        $user = Auth::user();

        if (Auth::check()) {
            $count = Cart::where('username', $user->username)->count();
            return view('oftb_contacto', ['quantityCard' => $count]);
        }
        
        return view('oftb_contacto');
    }
}
