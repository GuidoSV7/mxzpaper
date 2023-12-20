<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarProducto extends Component
{
    public $name;
    public $description;
    public $photourl;
    public $url_imagen_nueva;
    public $price;

    public $producto;

    use WithFileUploads;

    protected $rules = [
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'url_imagen_nueva' => 'nullable|image',
        'price' => 'nullable|integer',
    ];

    public function mount(Product $producto)
    {
        $this->name = $producto->name;
        $this->description = $producto->description;
        $this->photourl = $producto->photourl;
        $this->price = $producto->price;
        $this->producto = $producto;
    }

    public function editarProducto()
    {
        $datos = $this->validate();

        if ($this->url_imagen_nueva) {
            $photourl = $this->url_imagen_nueva->store('public/productos');
            $datos['photourl'] = str_replace('public/productos', '', $photourl);
        }

        $producto = Product::find($this->producto->id);

        $producto->name = $datos['name'];
        $producto->description = $datos['description'];
        $producto->price = $datos['price'];
        $producto->photourl = $datos['photourl'] ?? $producto->photourl;

        $producto->save();

        // Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        // Redireccionar el usuario
        return redirect()->route('dashboard');
    }

    public function render()
    {
        // Utiliza $this->producto directamente para pasar la variable a la vista
        return view('livewire.editar-producto', [
            'producto' => $this->producto
        ]);
    }
}
