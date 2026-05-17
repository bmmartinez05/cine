<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class EstrenosController extends Controller
{

    public function index()
    {
        $estrenos = Pelicula::where('es_estreno', true)->get();

        return view('estrenos', compact('estrenos'));
    }
}