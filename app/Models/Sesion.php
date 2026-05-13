<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesiones'; 
    protected $primaryKey = 'id_sesion'; 
    public $timestamps = false; 

    // Cable para conectar con la tabla Peliculas
    public function pelicula()
    {
        // Una sesión pertenece a una película
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    // Cable para conectar con la tabla Salas
    public function sala()
    {
        // Una sesión se proyecta en una sala
        return $this->belongsTo(Sala::class, 'id_sala', 'id_sala');
    }
}
