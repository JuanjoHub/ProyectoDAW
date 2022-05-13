<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class LogoutController extends Controller
{
    
    //Funcion para el logout
    public function logout(Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect()->to('/login');
    }


}
