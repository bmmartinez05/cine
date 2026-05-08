<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    // Asegúrate de que el nombre entre comillas sea el nombre exacto de tu tabla en phpMyAdmin
    protected $table = 'entradas'; 
    
    // Lo ponemos en false por si vuestra tabla no tiene las columnas created_at y updated_at
    public $timestamps = false; 
}
