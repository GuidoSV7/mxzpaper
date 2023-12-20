<?php

namespace App\Http\Livewire;

use App\Models\Pay;
use Livewire\Component;

class CrearPago extends Component
{
    public $title;
    public $description;
    public $total;
    public $iduser;



    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'total' => 'required',


    ];


    public function crearPago(){
        $datos = $this->validate();


        //Guarda info en la tabla pago
        Pay::create([
            'title' => $datos['title'],
            'description' => $datos['description'],
            'total' => $datos['total'],



        ]);



        //Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        //Redireccuonar el usuario
        return redirect()->route('dashboard');

    }
    public function render()
    {
        return view('livewire.crear-pago');
    }
}
