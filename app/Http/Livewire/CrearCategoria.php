<?php

namespace App\Http\Livewire;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearCategoria extends Component
{
    public $name;


    use WithFileUploads;



    protected $rules = [
        'name' => 'required|string',

    ];


    public function crearCategoria(){
        $datos = $this->validate();


        //Guarda info en la tabla categoria
        Category::create([
            'name' => $datos['name'],

        ]);



        //Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        //Redireccuonar el usuario
        return redirect()->route('dashboard');

    }
    public function render()
    {
        return view('livewire.crear-categoria');
    }
}
