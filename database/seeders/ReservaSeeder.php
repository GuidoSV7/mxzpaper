<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservas')->insert([
            'carnet' => '46546512',
            'nombre' => 'Cliente 2',
            'telefono' => 675442342,
            'correo' =>'correo2@correo.com',
            'direccion' =>'Los Tajibos',
            'user_id' => 4,
            'habitacion_id' => 1,
            'estado' => 'Completado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         ]); 

         DB::table('reservas')->insert([
            'nombre' => 'Cliente 3',
            'carnet' => '465256',
            'correo' => 'correo3@correo.com',
            'direccion' =>'Plan 3000',
            'telefono' => 675452342,
            'user_id' => 5,
            'habitacion_id' => 2,
            'estado' => 'Procesando',
            'fecha_llegada' => '2023-05-17',
            'fecha_salida' => '2023-05-24',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         ]);

         DB::table('reservas')->insert([
            'nombre' => 'Cliente 4',
            'carnet' => '48346',
            'direccion' =>'3er Anillo Av Pirai',
            'correo' => 'correo4@correo.com',
            'telefono' => 675454232,
            'user_id' => 6,
            'habitacion_id' => 3,
            'estado' => 'Completado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         ]);

         DB::table('reservas')->insert([
            'nombre' => 'Cliente 5',
            'carnet' => '67956',
            'correo' => 'correo5@correo.com',
            'direccion' =>'Los Olivos Calle 5',
            'telefono' => 675454234,
            'user_id' => 7,
            'habitacion_id' => 4,
            'estado' => 'Procesando',
            'fecha_llegada' => '2023-05-17',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         ]);
    }
}
