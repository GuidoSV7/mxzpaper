<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MostrarCategoria extends Component
{
    public $categoria;

    public function mount(Category $categoria)
    {
        $this->categoria = $categoria;
    }

    public function render(Category $categoria)
    {
        return view('livewire.mostrar-categoria', [
            'categoria' => $categoria
        ]);
    }
}
