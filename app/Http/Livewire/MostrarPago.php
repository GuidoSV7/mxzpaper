<?php

namespace App\Http\Livewire;

use App\Models\Pay;
use Livewire\Component;

class MostrarPago extends Component
{
    public $pago;

    public function mount(Pay $pago)
    {
        $this->pago = $pago;
    }

    public function render(Pay $pago)
    {
        return view('livewire.mostrar-pago', [
            'pago' => $pago
        ]);
    }
}
