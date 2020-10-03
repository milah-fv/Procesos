<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    /*
    * Función para mostrar el formulario de login del administrador
    */
	public function showLoginForm() 
	{
    	return view('auth.admin_login');
    }

    /*
    * Función para validar el ingreso del administrador 
    */
    public function login(Request $request)
    {
		$this->validate($request,[
			'email' => 'required|email',
			'password' => ' required|min:6'
		]);

		if (Auth::guard('user')->attempt([
			'email' => $request->email, 
			'password' => $request->password],
			$request->remember)) 
		{
			return redirect()->intended(route('admin.home'));
		}
		else 
		{
			return redirect()->back()->withInput($request->only('email','remember'));
		}
    }

    /*
    * Función para cerrar sesión del administrador 
    */
    public function logout()
    {
		Auth::guard('user')->logout();
		return redirect('/');
    }
}
