<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use Livewire\Component;

class MostrarReserva extends Component
{
    public $reserva;

    public function mount(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }
    
    public function render(Reserva $reserva)
    {
        return view('livewire.mostrar-reserva', [
            'reserva' => $reserva
        ]);
    }
}
