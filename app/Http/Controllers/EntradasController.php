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
            
            $entrada->id_usuario = 1; 

            $entrada->save();

            return back()->with('success', '¡Butaca reservada correctamente!');

        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', '¡Vaya! Esa butaca se acaba de ocupar. Elige otra.');
            }

            return back()->with('error', 'Hubo un problema al realizar la reserva.');
        }
    }
}





    