<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Habitacion;
use App\Models\Servicio;

class HabitacionSeeder extends Seeder
{
    public function run()
    {
        // Crear 3 habitaciones con todos los servicios
        $habitacion1 = Habitacion::create([
            'numero' => '101',
            'piso' => 1,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 1,
            'tipo_habitacion_id' => 1
        ]);
        $habitacion1->servicios()->sync(Servicio::pluck('id'));

        $habitacion2 = Habitacion::create([
            'numero' => '102',
            'piso' => 1,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 1,
            'tipo_habitacion_id' => 1
            ]);
        $habitacion2->servicios()->sync(Servicio::pluck('id'));

        $habitacion3 = Habitacion::create([
            'numero' => '103',
            'piso' => 1,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 1,
            'tipo_habitacion_id' => 1
        ]);
        $habitacion3->servicios()->sync(Servicio::pluck('id'));

        // Crear 1 habitacion con dos servicios
        $habitacion4 = Habitacion::create([
            'numero' => '201',
            'piso' => 2,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 2,
            'tipo_habitacion_id' => 2
        ]);
        $habitacion4->servicios()->sync([1, 2]);

        // Crear 3 habitaciones con solo un servicio
        $habitacion5 = Habitacion::create([
            'numero' => '301',
            'piso' => 3,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 2,
            'tipo_habitacion_id' => 2
        ]);
        $habitacion5->servicios()->sync([1]);

        $habitacion6 = Habitacion::create([
            'numero' => '302',
            'piso' => 3,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 2,
            'tipo_habitacion_id' => 2
        ]);
        $habitacion6->servicios()->sync([2]);

        $habitacion7 = Habitacion::create([
            'numero' => '303',
            'piso' => 3,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 3,
            'tipo_habitacion_id' => 3
        ]);
        $habitacion7->servicios()->sync([3]);

        // Crear 2 habitaciones sin servicios
        $habitacion8 = Habitacion::create([
            'numero' => '801',
            'piso' => 8,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 3,
            'tipo_habitacion_id' => 3
        ]);

        $habitacion9 = Habitacion::create([
            'numero' => '802',
            'piso' => 8,
            'url_imagen' => 'kELX9zkBSBgJJlvAnXLUUTG0ArIEuFiZJpdk1D1T.jpg',
            'estado_habitacion_id' => 3,
            'tipo_habitacion_id' => 3
        ]);
    }
}
