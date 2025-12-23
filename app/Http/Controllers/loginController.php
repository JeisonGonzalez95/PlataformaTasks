<?php

namespace App\Http\Controllers;

use App\Models\users_app;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            session(['fullname' => $user->fullname]);
            return redirect()->route('index');
        }

        return redirect()->route('app')->with('alerta', [
            'titulo' => '¡Error!',
            'mensaje' => 'Usuario o contraseña incorrectos, intente nuevamente.',
            'icono' => 'error',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }

    public function logoutUser(Request $request)
    {
        auth()->guard('web')->logout();
        session()->forget(['name', 'lastname']);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('app')->with('alerta', [
            'titulo' => '',
            'mensaje' => 'Gracias por visitarnos.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }


    public function registerUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:3',
            'user' => 'required|min:3',
            'email' => 'required|email|unique:users_app,email',
            'pass_1' => 'required|min:6',
            'pass_2' => 'required|min:6',
        ]);

        if ($request->pass_1 == $request->pass_2) {

            $user = users_app::create([
                'fullname' => $request->fullname,
                'username' => $request->user,
                'email' => $request->email,
                'password' => bcrypt($request->pass_1),
            ]);

            if ($user) {
                return redirect()->route('app')->with('alerta', [
                    'titulo' => '¡Éxito!',
                    'mensaje' => 'Usuario creado correctamente.',
                    'icono' => 'success',
                    'confirmarTexto' => 'Entendido',
                    'mostrarCancelar' => false
                ]);
            } else {
                return redirect()->route('app')->with('alerta', [
                    'titulo' => '¡Ups!',
                    'mensaje' => 'Ocurrio un error en la creación, intente nuevamente.',
                    'icono' => 'warning',
                    'confirmarTexto' => 'Entendido',
                    'mostrarCancelar' => false
                ]);

            }
        }
    }
}
