<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{

    protected $fillable=[
        'descripcion',
    ];

    use HasFactory;

    protected $table = 'estado_habitaciones';
}
