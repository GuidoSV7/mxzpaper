<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{    protected $fillable=[
    'title',
    'description',
    'total',


    ];
    use HasFactory;
}
