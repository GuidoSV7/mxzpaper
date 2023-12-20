<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{    protected $fillable=[
    'carnet',
    'nombre',     
    'telefono',
    'correo',
    'direccion',
    'fecha_llegada',
    'fecha_salida',
    'user_id',
    'habitacion_id',
    'estado'
];
    use HasFactory;


    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Habitaciones()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }


}
