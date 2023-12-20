<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'nombre' => 'Juan Cruz Santo',
            'carnet' => '222222',
            'correo' => 'correo1@correo.com',
            'password' => '12345678',
            'telefono' => 675442342,
            'user_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
         ]);

         DB::table('clientes')->insert([
             'nombre' => 'Cliente 2',
             'carnet' => '222222',
             'correo' =>'correo2@correo.com',
             'password' => '12345678',
             'telefono' => 675442342,
             'user_id' => 5,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
          ]);

          DB::table('clientes')->insert([
             'nombre' => 'Cliente 3',
             'carnet' => '222222',
             'correo' => 'correo3@correo.com',
             'password' => '12345678',
             'telefono' => 675452342,
             'user_id' => 6,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
          ]);

          DB::table('clientes')->insert([
             'nombre' => 'Cliente 4',
             'carnet' => '222222',
             'correo' => 'correo4@correo.com',
             'password' => '12345678',
             'telefono' => 675454232,
             'user_id' => 7,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
          ]);

          DB::table('clientes')->insert([
             'nombre' => 'Cliente 5',
             'carnet' => '222222',
             'correo' => 'correo5@correo.com',
             'password' => '12345678',
             'telefono' => 675454234,
             'user_id' => 8,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
          ]);
    }
}
