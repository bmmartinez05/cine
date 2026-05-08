<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; // <-- 1. Añade esto arriba del todo
use App\Http\Controllers\SesionController; // <-- ¡AÑADE ESTA LÍNEA!
// Te recomiendo añadir también la del EntradaController que lo tienes más abajo y te dará error luego:
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\AccesoController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['admin'])->group(function () {
    // Sesiones
    Route::get('/sesiones/crear', [SesionController::class, 'create']);
    Route::post('/sesiones/guardar', [SesionController::class, 'store']);
    
    // Películas (suponiendo que tienes estos métodos)
    Route::get('/cartelera/crear', [PeliculaController::class, 'create']);
    Route::post('/cartelera/guardar', [PeliculaController::class, 'store']);

});

Route::get('/cartelera', [PeliculaController::class, 'index']);
// Ruta para ver los detalles de una película concreta
Route::get('/pelicula/{id}', [PeliculaController::class, 'show']);
Route::post('/reservar-butaca', [EntradasController::class, 'reservar'])->name('entradas.reservar');
Route::get('/comprar/{id}', [\App\Http\Controllers\CompraController::class, 'elegirButaca']);
Route::get('/sesiones', [SesionController::class, 'index']);
Route::get('/login', [AccesoController::class, 'mostrarLogin']);
Route::post('/login', [AccesoController::class, 'entrar']);
Route::get('/logout-manual', [AccesoController::class, 'salir']); // Usamos GET para simplificar el botón

Route::get('/registro', [AccesoController::class, 'mostrarRegistro']);
Route::post('/registro', [AccesoController::class, 'registrar']);
