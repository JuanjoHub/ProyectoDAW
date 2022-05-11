<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     /* Metodo que proporciona laravel para en el que indicamos que campos va a rellenar cuando ingresemos un usario */
    protected $fillable = [
        'email',
        'nombre_usuario',
        'password',
        'fecha_nacimiento',
        'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /* Metodo para poder encriptar la contraseña */
    /*Mutator */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
