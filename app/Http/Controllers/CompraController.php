<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;  // Importante: Referencia al modelo
use App\Models\Entrada; // Importante: Referencia al modelo

class CompraController extends Controller
{
    public function elegirButaca($id)
    {
        // Buscamos la sesión por su ID. Si no existe, lanza error 404.
        $sesion = Sesion::findOrFail($id);

        // Obtenemos las entradas vendidas para esta sesión[cite: 1].
        $ocupados = Entrada::where('id_sesion', $id)->get();

        // Cargamos la vista pasando un diccionario con los datos[cite: 1].
        return view('compras.seleccion', [
            'sesion' => $sesion,
            'ocupados' => $ocupados
        ]);
    }
}