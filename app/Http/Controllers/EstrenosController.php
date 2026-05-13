<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class EstrenosController extends Controller
{
    /**
     * Muestra la lista de películas marcadas como estrenos.
     */
    public function index()
    {
        // Traemos solo las películas donde es_estreno sea true (1)
        $estrenos = Pelicula::where('es_estreno', true)->get();

        // Enviamos los datos a la vista 'estrenos.blade.php'
        return view('estrenos', compact('estrenos'));
    }
}