<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class MostrarProducto extends Component
{
    public $producto;

    public function mount(Product $producto)
    {
        $this->producto = $producto;
    }

    public function render(Product $producto)
    {
        return view('livewire.mostrar-producto', [
            'producto' => $producto
        ]);
    }
}
