<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    // Aquí obligamos a Laravel a usar el español
    protected $table = 'sesiones'; 
    protected $primaryKey = 'id_sesion'; 
    public $timestamps = false; 
}
