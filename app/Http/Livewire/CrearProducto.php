<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProducto extends Component
{
    public $name;
    public $description;
    public $photourl;
    public $price;

    use WithFileUploads;



    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'photourl' => 'required|image|max:1024',
        'price' => 'required|integer',
    ];


    public function crearProducto(){
        $datos = $this->validate();

        // Almacenar imagen
        $photourl = $this->photourl->store('public/productos');
        $datos['photourl'] = str_replace('public/productos/', '', $photourl);


        //Guarda info en la tabla Producto
        Product::create([
            'name' => $datos['name'],
            'description' => $datos['description'],
            'photourl' => $datos['photourl'],
            'price' => $datos['price'],
        ]);



        //Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        //Redireccuonar el usuario
        return redirect()->route('dashboard');

    }
    public function render()
    {
        return view('livewire.crear-producto');
    }
}
