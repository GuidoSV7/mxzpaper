<?php

namespace App\Http\Livewire;

use App\Models\Bitacora;
use Livewire\Component;

class MostrarBitacora extends Component
{
    public function render()
    { $bitacoras = Bitacora::all();

    return view('livewire.mostrar-bitacora', [
        'bitacoras' => $bitacoras
    ]);
        
}
}