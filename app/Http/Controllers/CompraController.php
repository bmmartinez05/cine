<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Entrada;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    // TU LÓGICA ORIGINAL (Sin tocar)
    public function elegirButaca($id)
    {
        $sesion = Sesion::findOrFail($id);
        $ocupados = Entrada::where('id_sesion', $id)->get();

        return view('compras.seleccion', [
            'sesion' => $sesion,
            'ocupados' => $ocupados
        ]);
    }

 public function mostrarBanco(Request $request)
{
    // Creamos el array con los nombres EXACTOS que busca tu vista compras.blade.php
    $datos = [
        'id_sesion'   => $request->id_sesion,
        'titulo'      => $request->titulo_peli, 
        'fila'        => $request->fila,
        'columna'     => $request->columna,
        'precio'      => 7.50  
    ];

    // Ahora enviamos el array ya preparado a la vista
    return view('compras', compact('datos'));
}

    public function finalizarCompra(Request $request)
    {
        Entrada::create([
            'id_sesion' => $request->id_sesion,
            'fila'      => $request->fila,
            'columna'   => $request->columna,
            'id_usuario' => Auth::id() ?? 1,
        ]);

        return redirect()->route('compra.exito')->with('success', '¡Compra realizada!');
    }

    public function misReservas()
    {
        // 1. Obtenemos el ID del usuario actual
        $usuarioId = auth()->id() ?? 1; 
    
        // 2. Buscamos sus entradas, cargando también la relación con 'sesion' y 'pelicula'
        // Usamos 'with' para que traiga el título de la película y la hora automáticamente
        $reservas = Entrada::where('id_usuario', $usuarioId)
                            ->with(['sesion.pelicula', 'sesion.sala'])
                            ->get();
    
        return view('historial', compact('reservas'));
    }
}