<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    
    protected $fillable=[
            'descripcion',
            'estado',     
            'nombre'
            
        ];

    use HasFactory;


    public function habitaciones()
    {
        return $this->belongsToMany(Habitacion::class, 'habitacion_has_servicio', 'servicio_id', 'habitacion_id');
    }
}
