<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Producto1',
            'description' =>'Descripcion del producto',
            'photourl' => 'http:procucto.com',
            'price' => 50,
         ]);
    }
}
