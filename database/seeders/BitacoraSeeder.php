<?php

namespace Database\Seeders;

use App\Models\Bitacora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bitacora::create([
            'descripcion' => 'Se creó una habitación',
            'nombre_registro' => 'Maily Celina Valdez',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Bitacora::create([
            'descripcion' => 'Se editó una habitación',
            'nombre_registro' => 'Maily Celina Valdez',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Bitacora::create([
            'descripcion' => 'Se eliminó una habitación',
            'nombre_registro' => 'Maily Celina Valdez',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
