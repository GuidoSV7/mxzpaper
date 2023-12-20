<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bitacora;
use App\Models\TipoHabitacion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(AdministradorSeeder::class);
        $this->call(EstadoHabitacionSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(TipoHabitacionSeeder::class);
        $this->call(HabitacionSeeder::class);
        $this->call(BitacoraSeeder::class);
        $this->call(ReservaSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
