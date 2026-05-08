<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SoloAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // AQUÍ ELIGES: Pon tu DNI o tu correo de administrador
        $dniAdmin = '12345678Z'; 
        $dniSesion = Session::get('usuario_dni');

        if (!$dniSesion || $dniSesion !== $dniAdmin) {
            return redirect('/cartelera')->with('error', 'No tienes permiso para entrar ahí.');
        }

        return $next($request);
    }
}