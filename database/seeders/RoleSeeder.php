<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Cliente']);
        $role3 = Role::create(['name'=>'Usuario']);
        

        Permission::create(['name'=> 'usuarios.create'])->assignRole($role1);
        Permission::create(['name'=> 'usuarios.edit'])->assignRole($role1);
        Permission::create(['name'=> 'usuarios.lista'])->assignRole($role1);
        Permission::create(['name'=> 'usuarios.show'])->assignRole($role1);


        
        $dashboardPermission = Permission::firstOrCreate(['name' => 'dashboard']);
        $dashboardPermission->syncRoles([$role1, $role2, $role3]);




    }
}
