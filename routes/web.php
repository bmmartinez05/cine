<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; // <-- 1. Añade esto arriba del todo
use App\Http\Controllers\SesionController; 
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\EstrenosController;
use App\Http\Controllers\CompraController;

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

Route::get('/inicio', function () { return view('inicio'); });
Route::get('/estrenos', [EstrenosController::class, 'index']); 
Route::get('/perfil', [AccesoController::class, 'verPerfil']);

Route::get('/seleccion/{id}', [CompraController::class, 'elegirButaca'])->name('seleccion.butacas');

Route::post('/ir-al-pago', [CompraController::class, 'mostrarBanco'])->name('compra.banco');

Route::post('/finalizar-compra', [CompraController::class, 'finalizarCompra'])->name('compra.finalizar');

Route::get('/compra-exitosa', function () {return view('exito');})->name('compra.exito');

Route::get('/reservas', [CompraController::class, 'misReservas'])->name('mis.reservas');