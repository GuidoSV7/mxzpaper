<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function dashboard()

    {
        $users = User::all();
        $productos = Product::all();

        $puntos = [];
        foreach ($productos as $producto){
            $puntos[] = ['name' => $producto['name'], 'y' => floatval($producto['price'])];

        }


        return view('dashboard', [
            'data' => json_encode($puntos),
        ]);



    }
}
