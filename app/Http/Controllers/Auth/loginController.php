<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; ////////////
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; ////////////

class loginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('panel');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {



        // es para validar credenciales

        if (Auth::attempt($request->only('email', 'password'))) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Redirigir a la ruta 'panel' con mensaje de bienvenida personalizado
            return redirect()->route('panel')->with('success', '¡Bienvenido ' . $user->nombre . '!');
        } else {
            // Credenciales incorrectas: volver al login con error
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }
}
