<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo 1
        Servicio::create([
            'estado' => '1',
            'descripcion' => 'Wi-Fi',
        ]);

        // Ejemplo 2
        Servicio::create([
            'estado' => '1',
            'descripcion' => 'TV por cable',
        ]);

        // Ejemplo 3
        Servicio::create([
            'estado' => '0',
            'descripcion' => 'Aire acondicionado',
        ]);

    }
}


