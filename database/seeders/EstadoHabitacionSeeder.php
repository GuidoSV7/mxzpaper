<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_habitaciones')->insert([
            'descripcion' => 'Disponible',
         ]);

         DB::table('estado_habitaciones')->insert([
            'descripcion' => 'Ocupada',
         ]);

         DB::table('estado_habitaciones')->insert([
            'descripcion' => 'Limpieza',
         ]);

    }
}
