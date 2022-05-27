<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            //reglas que implementaremos para la validacion
            'email'=>'required|unique:users,email',
            'username'=>'required|unique:users,username',
            'password'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'password_confirmation'=>'required|same:password',
            'phone'=>'regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/',
            // 'birthdate'=>'require|min:10',
            
            
            
        ];
    }
}
