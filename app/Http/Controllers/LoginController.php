<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //importamos la clase para manejar autentificaciones

class LoginController extends Controller
{
    public function show()
    {
        //Si estamos logeados nos redigira a home, aunque seleccionemos la pestaña login
        if (Auth::check()) {
            return redirect('/home');
            //Si no estamos logeados si nos permitirá ir a la vista de login
        } else {
            return view('Authenticated.oftb_login');
        }
    }

    public function login(LoginRequest $request)
    {
        //Primero Obtenemos las credenciales
        $credentials = $request->getCredentials();

        //Si falla la autenticacion nos redigira al login conel mensaje de error
        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Username or password incorrect');
        }
        //Creamos la sesion de nuestro usuario
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/home');
    }
}
