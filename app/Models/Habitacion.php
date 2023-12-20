<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable=[
        'numero',
        'piso',     
        'url_imagen',
        'estado_habitacion_id',
        'tipo_habitacion_id'
    ];
    use HasFactory;
    protected $table = 'habitaciones';
    
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'habitacion_has_servicio', 'habitacion_id', 'servicio_id');
    }

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_habitacion_id');
    }

    public function estadoHabitacion()
    {
        return $this->belongsTo(EstadoHabitacion::class, 'estado_habitacion_id');
    }
}
