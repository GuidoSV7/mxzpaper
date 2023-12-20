<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarUsuario extends Component

{

    public $usuario;

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function render(User $usuario)
    {


        return view('livewire.mostrar-usuario');
    }
}
