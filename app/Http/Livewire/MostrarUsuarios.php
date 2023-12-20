<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Bitacora;

//Exportar
use App\Exports\UserReport;
use Illuminate\Http\Request;

use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MostrarUsuarios extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $startDate;
    public $endDate = null;
    

    protected $listeners = ['eliminarUsuario'];

    public function eliminarUsuario(User $usuario)
    {

        Bitacora::create([
            'descripcion' => 'Se ha eliminado un usuario',
            'nombre_registro' => auth()->user()->name,
        ]);
        
        $usuario->delete();
    }


    


    // public function updatedStartDate()
    // {
    //     $this->startDate;

    //     return $this->startDate;
    // }



    // public function filterByDate()
    // {
    //     $this->resetPage();
    // }

    public function render()
    {
        $usuarios = User::query()
            ->where('id', '!=', auth()->user()->id)
            ->where(function ($query) {
                $query->where('name', 'LIKE', "%{$this->searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$this->searchTerm}%");
            })
            ->when($this->startDate, function ($query) {
                $query->whereDate('created_at', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->paginate(5);

        return view('livewire.mostrar-usuarios', [
            'usuarios' => $usuarios
        ]);
    }
}
