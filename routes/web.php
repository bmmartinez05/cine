<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; // <-- 1. Añade esto arriba del todo

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cartelera', [PeliculaController::class, 'index']);
// Mostrar el formulario
Route::get('/cartelera/crear', [PeliculaController::class, 'create']);

// Recibir los datos y guardarlos
Route::post('/cartelera/guardar', [PeliculaController::class, 'store']);
// Ruta para ver los detalles de una película concreta
Route::get('/pelicula/{id}', [PeliculaController::class, 'show']);
