<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Database\QueryException;



class EntradasController extends Controller
{
    /**
     * Procesa la reserva de una butaca.
     * Implementa control de concurrencia mediante excepciones de BD.
     */
    public function reservar(Request $request)
    {
        try {
            // 1. Creamos el objeto del modelo Entrada
            $entrada = new Entrada();
            $entrada->id_sesion = $request->id_sesion;
            $entrada->fila = $request->fila;
            $entrada->columna = $request->columna;
            
            // 2. Asignamos el usuario (Si no tienes login, usa un ID fijo como 1 para probar)
            // $entrada->id_usuario = auth()->id(); 
            $entrada->id_usuario = 1; 

            // 3. Intentamos guardar. 
            // Si alguien ya guardó este asiento, la base de datos saltará aquí.
            $entrada->save();

            // 4. Si todo va bien, volvemos con mensaje de éxito
            return back()->with('success', '¡Butaca reservada correctamente!');

        } catch (QueryException $e) {
            // 5. CONTROL DE CONCURRENCIA:
            // El código 23000 es "Violación de restricción de integridad" (Duplicate entry)
            if ($e->getCode() == 23000) {
                return back()->with('error', '¡Vaya! Esa butaca se acaba de ocupar. Elige otra.');
            }

            // Para cualquier otro error de base de datos
            return back()->with('error', 'Hubo un problema al realizar la reserva.');
        }
    }
}





    