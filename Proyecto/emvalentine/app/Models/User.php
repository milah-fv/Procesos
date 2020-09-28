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

    /*
    * Especificando conexión hacia el procedimiento almacenado Adicionar
    */
    public function spProductA()
    {
        DB::select('SP_A_table_users(?,?,?,?,?,?,?,?,?,?,?,?,?)', [$id, $name, $email, $password, $last_name, $avatar, $actived, $celphone, $function] );
    }  

    /*
    * Especificando conexión hacia el procedimiento almacenados Consultar
    */
    public function spProductC()
    {
        $consultProducts = DB::select('SP_C_table_users');
        return $consultProducts;
    }
    /*
    * Especificando conexión hacia el procedimiento almacenados Modificar
    */
    public function spProductM()
    {
        DB::select('SP_M_table_users(?)', [$id] );
    }

    /*
    * Especificando conexión hacia el procedimiento almacenados Eliminar
    */
    public function spProductE()
    {
        DB::select('SP_E_table_users(?)', [$id]
    }

}
