<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula; 

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all(); // Saca todas las películas de la base de datos
        return view('cartelera', compact('peliculas')); // Se las manda a una vista llamada 'cartelera'
    }

    // Esta función solo muestra la página del formulario
    public function create()
    {
        return view('crear_pelicula');
    }

    // Esta función recibe los datos del formulario y los guarda en la base de datos
    public function store(Request $request)
    {
        // Creamos una nueva película en blanco
        $pelicula = new Pelicula();
        
        // Le rellenamos los datos con lo que el usuario ha escrito en el formulario
        $pelicula->titulo = $request->titulo;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;
        $pelicula->foto_cartel = $request->foto_cartel;
        
        // La guardamos en la base de datos
        $pelicula->save();

        // Redirigimos de vuelta a la cartelera para verla ya añadida
        return redirect('/cartelera');
    }

    // Muestra los detalles de una sola película
    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id); 
        return view('detalle', compact('pelicula')); 
    }
}