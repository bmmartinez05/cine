<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Entrada;
use App\Models\User;


// Eliminamos Auth porque usas sesiones manuales

class CompraController extends Controller
{
    public function elegirButaca($id)
    {
        // Verificación de seguridad
        if (!session()->has('usuario_dni')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para comprar entradas.');
        }

        $sesion = Sesion::findOrFail($id);
        $ocupados = Entrada::where('id_sesion', $id)->get();

        return view('compras.seleccion', [
            'sesion' => $sesion,
            'ocupados' => $ocupados
        ]);
    }

    public function mostrarBanco(Request $request)
    {
        $datos = [
            'id_sesion'   => $request->id_sesion,
            'titulo'      => $request->titulo_peli, 
            'fila'        => $request->fila,
            'columna'     => $request->columna,
            'precio'      => 7.50  
        ];

        return view('compras', compact('datos'));
    }

public function finalizarCompra(Request $request)
{
    // Buscamos al usuario en la tabla 'usuarios' usando el DNI de la sesión
    $usuario = \App\Models\User::where('dni', session('usuario_dni'))->first();

    if (!$usuario) {
        return redirect('/login')->with('error', 'No se ha encontrado el usuario con DNI: ' . session('usuario_dni'));
    }

    // Usamos el ID de la columna 'id_usuario' que se ve en tu imagen
    $id_del_cliente = $usuario->id_usuario;

    // Insertamos la entrada en la tabla 'entradas'
    \App\Models\Entrada::create([
        'id_sesion'  => $request->id_sesion,
        'fila'       => $request->fila,
        'columna'    => $request->columna,
        'id_usuario' => $id_del_cliente, 
    ]);

    return redirect()->route('compra.exito')->with('success', '¡Compra realizada con éxito!');
}

public function misReservas()
{
    $usuario = \App\Models\User::where('dni', session('usuario_dni'))->first();

    if (!$usuario) {
        return redirect('/login');
    }

    // Usamos el ID numérico que ya sabemos que funciona
    $reservas = \App\Models\Entrada::where('id_usuario', $usuario->id_usuario)
                        ->with('sesion.pelicula') // Esto carga la película de golpe
                        ->get();

    return view('historial', compact('reservas'));
}

public function eliminarReserva($id)
    {
        // Buscamos la reserva por su id_entrada
        $reserva = Entrada::where('id_entrada', $id)->firstOrFail();

        // Buscamos el usuario en la BD usando el DNI que está en la sesión
        $usuario = \App\Models\Usuarios::where('dni', session('usuario_dni'))->first();

        // Sacamos el ID numérico del usuario de la BD
        $idUsuarioBD = $usuario->id ?? $usuario->id_usuario ?? null;

        if ($idUsuarioBD && $reserva->id_usuario == $idUsuarioBD) {
            
            Entrada::where('id_entrada', $id)->delete();
            
            return back()->with('success', '¡Reserva cancelada correctamente y asiento liberado!');
        }

        return back()->with('error', 'No se ha podido cancelar la reserva (Problema de permisos).');
    }
}