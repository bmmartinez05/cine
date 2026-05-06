<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // Le decimos a Laravel el nombre exacto de la tabla
    protected $table = 'peliculas'; 
    
    // Le indicamos que la clave primaria se llama así, y no simplemente 'id'
    protected $primaryKey = 'id_pelicula'; 
    
    // Apagamos las fechas automáticas porque tu compañera no las incluyó en la tabla
    public $timestamps = false; 
}
