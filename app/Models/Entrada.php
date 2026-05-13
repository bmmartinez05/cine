<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    // Asegúrate de que el nombre entre comillas sea el nombre exacto de tu tabla en phpMyAdmin
    protected $table = 'entradas'; 
    protected $fillable = [
        'id_sesion',
        'fila',
        'columna',
        'id_usuario',
    ];
    
    // Lo ponemos en false por si vuestra tabla no tiene las columnas created_at y updated_at
    public $timestamps = false; 
    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }
    
}
