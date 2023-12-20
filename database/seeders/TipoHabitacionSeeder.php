<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_habitaciones')->insert([
            'id' => 1,
            'descripcion' => 'Estandar',
            'precio' => 200,
            
        ]);

        DB::table('tipo_habitaciones')->insert([
            'id' => 2,
            'descripcion' => 'Basico',
            'precio' => 350,
            
        ]);

        DB::table('tipo_habitaciones')->insert([
            'id' => 3,
            'descripcion' => 'VIP',
            'precio' => 500,
            
        ]);
    }
}
