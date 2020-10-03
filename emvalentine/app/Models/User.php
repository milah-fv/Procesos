<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;

class User extends Authenticatable
{
    /*
    * Modelo User:
    * Creando conexion hacia la tabla usuario
    */
    use Notifiable;

    /*
    * Protegiendo el campo de la contraseña
    */
    protected $fillable = [
        'name', 'email', 'password', 'last_name','avatar','actived', 'celphone', 'function'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];


}
