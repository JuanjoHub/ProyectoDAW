<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function show()
    {
        return view('oftb_registro');
    }

    public function register(RegisterRequest $request)
    /*request que hace referencia a los datos que le vamos a pasar por el formulario */
    /* php artisan make:request RegisterRequest creara la carpeta Request con una clase enla que podremos autorizar o no que una solicitud avance*/
    {
        $user = User::create($request->validated());
        /*Una vez validado le pasemos un return con un redirect al login con un mensaje */
        return redirect('/login')->with('success', 'Account created successfuly');
    }
}
