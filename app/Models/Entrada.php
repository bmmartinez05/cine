<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas'; 
    protected $fillable = [
        'id_sesion',
        'fila',
        'columna',
        'id_usuario',
    ];
    
    public $timestamps = false; 
    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }
    
}
