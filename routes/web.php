<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; // <-- 1. Añade esto arriba del todo
use App\Http\Controllers\SesionController; // <-- ¡AÑADE ESTA LÍNEA!
// Te recomiendo añadir también la del EntradaController que lo tienes más abajo y te dará error luego:
use App\Http\Controllers\EntradasController;

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
Route::post('/reservar-butaca', [EntradasController::class, 'reservar'])->name('entradas.reservar');
Route::get('/comprar/{id}', [\App\Http\Controllers\CompraController::class, 'elegirButaca']);
Route::get('/sesiones', [SesionController::class, 'index']);
Route::get('/sesiones/crear', [SesionController::class, 'create']);
Route::post('/sesiones/guardar', [SesionController::class, 'store']);
