<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Pelicula;
use App\Models\Sala;

class SesionController extends Controller
{
    // Listado de sesiones
    public function index()
    {
        $sesiones = Sesion::all();
        return view('sesiones_index', ['sesiones' => $sesiones]);
    }

    // Formulario para crear nueva sesión
    public function create()
    {
        return view('sesiones_crear');
    }

    // Guardar la sesión en la base de datos
    public function store(Request $request)
    {
        $sesion = new Sesion();
        $sesion->ID_PELICULA = $request->id_pelicula;
        $sesion->ID_SALA = $request->id_sala;
        $sesion->HORA_INICIO = $request->hora_inicio;
        $sesion->save();

        return redirect('/sesiones');
    }
}