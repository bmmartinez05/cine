<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccesoController extends Controller
{
    // Esta es la función que te falta o que tiene un nombre distinto
    public function mostrarLogin() 
    {
        return view('sesion_usuario.login');
    }

public function entrar(Request $request) 
{
    // Buscamos al usuario
    $usuario = DB::table('USUARIOS')->where('EMAIL', $request->email)->first();

    if ($usuario) {
        // Convertimos el objeto a array para no pelear con las mayúsculas/minúsculas
        $uArray = (array)$usuario;
        
        // Buscamos la contraseña probando ambas opciones
        $passBD = $uArray['PASSWORD'] ?? $uArray['password'] ?? null;

        if ($passBD && Hash::check($request->password, $passBD)) {
            // Hacemos lo mismo para el DNI y el USERNAME
            Session::put('usuario_dni', $uArray['DNI'] ?? $uArray['dni']);
            Session::put('usuario_nombre', $uArray['USERNAME'] ?? $uArray['username']);
            
            return redirect('/sesiones');
        }
    }

    return back()->withErrors(['error' => 'Credenciales incorrectas']);
}

    public function mostrarRegistro() 
    {
        return view('sesion_usuario.registro');
    }

    public function registrar(Request $request) 
    {
        DB::table('USUARIOS')->insert([
            'DNI' => $request->dni,
            'USERNAME' => $request->username,
            'EMAIL' => $request->email,
            'PASSWORD' => Hash::make($request->password)
        ]);

        Session::put('usuario_dni', $request->dni);
        Session::put('usuario_nombre', $request->username);

        return redirect('/sesiones');
    }

    public function salir() 
    {
        Session::forget(['usuario_dni', 'usuario_nombre']);
        return redirect('/login');
    }
}