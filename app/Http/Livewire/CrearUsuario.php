<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Bitacora;
use Livewire\WithFileUploads;

class CrearUsuario extends Component
{

    public $name;
    public $email;
    public $password;
    public $user_id;
    
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string',     
    ];


    public function crearUsuario(){
        $datos = $this->validate();




        //Guarda info en la tabla Usuario
        User::create([
            'name' =>$datos['name'],
            'email' =>$datos['email'],
            'password' =>'$2y$10$OGQJXotRJOPr1mjmMzTr3.2TobzU0yoljfH4feBoWZ/otY96Oye/a',
            
        ])->assignRole('Usuario');


        //Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        Bitacora::create([
            'descripcion' => 'Se ha creado un usuario',
            'nombre_registro' => auth()->user()->name,
        ]);
        
        //Redireccuonar el usuario
        return redirect()->route('dashboard');

    }
    public function render()
    {
        return view('livewire.crear-usuario');
    }
}
