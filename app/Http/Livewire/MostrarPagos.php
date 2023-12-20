<?php

namespace App\Http\Livewire;

use App\Models\Pay;
use Livewire\Component;

class MostrarPagos extends Component
{
    public $searchTerm = '';
    public $startDate = null;
    public $endDate = null;

    protected $listeners = ['eliminaPpago'];

    public function eliminarpago(Pay $pago)
    {

        $pago->delete();
    }

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pagos = Pay::query()
            ->where(function ($query) {
                $query->where('title', 'LIKE', "%{$this->searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$this->searchTerm}%");
            })
            ->when($this->startDate, function ($query) {
                $query->whereDate('created_at', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->paginate(5);

        return view('livewire.mostrar-pagos', [
            'pagos' => $pagos
        ]);
    }
}
