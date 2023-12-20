<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodos_pagos')->insert([
            'descripcion' => 'Efectivo',
         ]);
        
         DB::table('metodos_pagos')->insert([
            'descripcion' => 'Tarjeta',
         ]);

         DB::table('metodos_pagos')->insert([
            'descripcion' => 'Qr',
         ]);
    }
}
