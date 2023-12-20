<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $fillable=[
        'descripcion',
        'precio',     
    ];
    use HasFactory;

    protected $table = 'tipo_habitaciones';
}
