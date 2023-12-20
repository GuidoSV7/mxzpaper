<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;


//Exportar

use App\Exports\UserReport;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MostrarProductos extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $startDate = null;
    public $endDate = null;

    protected $listeners = ['eliminarproducto'];

    public function eliminarproducto(Product $producto)
    {

        $producto->delete();
    }

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productos = Product::query()
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

        return view('livewire.mostrar-productos', [
            'productos' => $productos
        ]);
    }
}
