<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('Authenticated.oftb_registro');
    }

    public function register(RegisterRequest $request){
    /*request que hace referencia a los datos que le vamos a pasar por el formulario */
    /* php artisan make:request RegisterRequest creara la carpeta Request con una clase enla que podremos autorizar o no que una solicitud avance*/
    $username = $request->input('username');
    $email = $request->input(key: 'email');
    $password = $request->input(key: 'password');
    $phone = $request->input(key: 'phone');
    $birthdate = $request->input(key:'birthdate');

       //Creamos el objeto que va a contener los datos del formulario de registro y los insertamos si estan validados
        $user = User::create($request->validated());
        // /*Una vez validado le pasemos un return con un redirect al login con un mensaje */
        return redirect('/login')->with('success', 'Account created successfuly');
        
    }
}

function phoneCheck($phone){

    $regex = "/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/";
    return preg_match($regex, $phone);

}

function emailCheck($email){

    $regex = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
    return preg_match($regex, $email);
}

function passwordCheck($password){

    //Minimum eight characters, at least one uppercase letter, one lowercase letter and one number:
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    return preg_match($regex, $password);

}
