<?php

namespace App\Http\Livewire;

use App\Models\Pay;
use Livewire\Component;

class EditarPago extends Component
{
    public $title;
    public $description;
    public $total;
    public $pago;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'total' => 'required',

    ];


    public function mount(Pay $pago){
        $this->pago = $pago;
        $this->title = $pago->title;
        $this->description = $pago->description;
        $this->total = $pago->total;

    }

    public function editarPago(){
        $datos = $this->validate();


        //Encontrar la pago a editar
        $pago = Pay::find($this->pago->id);
        //asignar valores
        $pago->name = $datos['title'];
        $pago->description = $datos['description'];
        $pago->total = $datos['total'];






        //Guardar pago
        $pago->save();

        //redireccionar
        session()->flash('mensaje','Se actualizó correctamente');
        return redirect()->route('pagos.lista');
    }
    public function render(Pay $pago)

    {   $pago = Pay::find($this->pago->id);

        return view('livewire.editar-pago', [
            'pago' => $this->pago
        ]);
    }
}
