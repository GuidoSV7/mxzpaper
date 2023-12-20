<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Bitacora;

//Exportar
use App\Models\Habitacion;
use App\Exports\UserReport;
use App\Models\Habitaciones;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MostrarHabitaciones extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $startDate = null;
    public $endDate = null;

    protected $listeners = ['eliminarHabitacion'];

    public function eliminarHabitacion(Habitacion $habitacion)
    {
        Bitacora::create([
            'descripcion' => 'Se ha eliminado una habitacion',
            'nombre_registro' => auth()->user()->name,
        ]);
        $habitacion->delete();
    }

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $habitaciones = Habitacion::query()
            ->where(function ($query) {
                $query->where('numero', 'LIKE', "%{$this->searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$this->searchTerm}%");
            })
            ->when($this->startDate, function ($query) {
                $query->whereDate('created_at', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->paginate(5);

        return view('livewire.mostrar-habitaciones', [
            'habitaciones' => $habitaciones
        ]);
    }
}
