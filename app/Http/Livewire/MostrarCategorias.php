<?php

namespace App\Http\Livewire;

use Livewire\Component;

//Exportar

use App\Exports\UserReport;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MostrarCategorias extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $startDate = null;
    public $endDate = null;

    protected $listeners = ['eliminarCategoria'];

    public function eliminarCategoria(Category $categoria)
    {

        $categoria->delete();
    }

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categorias = Category::query()
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

        return view('livewire.mostrar-categorias', [
            'categorias' => $categorias
        ]);
    }
}
