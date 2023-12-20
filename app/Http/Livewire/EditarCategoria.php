<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditarCategoria extends Component
{
    public $name;
    public $categoria;

    protected $rules = [
        'name' => 'required|string',

    ];


    public function mount(Category $categoria){
        $this->name = $categoria->name;




    }

    public function editarCategoria(){
        $datos = $this->validate();


        //Encontrar la categoria a editar
        $categoria = Category::find($this->categoria->id);
        //asignar valores
        $categoria->name = $datos['name'];





        //Guardar categoria
        $categoria->save();

        //redireccionar
        session()->flash('mensaje','Se actualizó correctamente');
        return redirect()->route('categorias.lista');
    }
    public function render(Category $categoria)

    {   $categoria = Category::find($this->categoria->id);

        return view('livewire.editar-categoria', [
            'categoria' => $this->categoria
        ]);
    }
}
