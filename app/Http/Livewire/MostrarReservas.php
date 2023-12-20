<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use App\Models\Bitacora;
use Livewire\WithPagination;

class MostrarReservas extends Component
{
    use WithPagination;

    protected $listeners = ['eliminarReserva'];

    public function eliminarReserva(Reserva $reserva)
    {
        Bitacora::create([
            'descripcion' => 'Se ha eliminado una reserva',
            'nombre_registro' => auth()->user()->name,
        ]);
        $reserva->delete();
    }

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reservas = reserva::all();
        

        return view('livewire.mostrar-reservas', [
            'reservas' => $reservas
        ]);
    }
}
