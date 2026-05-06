<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas'; 
    protected $primaryKey = 'id_pelicula'; 
    public $timestamps = false; 

    public function sesiones()
    {
        return $this->hasMany(Sesion::class, 'id_pelicula', 'id_pelicula');
    }
}
