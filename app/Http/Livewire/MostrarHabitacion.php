<?php

namespace App\Http\Livewire;

use App\Models\Habitacion;
use Livewire\Component;

class MostrarHabitacion extends Component
{

    public $habitacion;

    public function mount(Habitacion $habitacion)
    {
        $this->habitacion = $habitacion;
    }
    
    public function render( Habitacion $habitacion)
    {
        return view('livewire.mostrar-habitacion', [
            'habitacion' => $habitacion
        ]);
    }
}
