<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'correo',
        'password',
        'user_id'
        
    ];
}
