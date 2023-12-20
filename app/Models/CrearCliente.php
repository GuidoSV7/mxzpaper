<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;


class CrearUsuario extends Model
{
    public $nombre;
    public $carnet;
    public $imagen;
    public $correo;
    public $contrasena;
    public $user_id;
    
    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string',
        'carnet' => 'required|integer',
        'correo' => 'required|string',
        'contrasena' => 'required|string',
        'imagen' => 'required|image|max:1024',
        
        
    ];


    public function crearUsuario(){
        $datos = $this->validate();

        //Almacenar imagen
        $imagen = $this->imagen->store('public/usuarios');
        $datos['imagen'] = str_replace('public/usuarios/' , '', $imagen);



        //Guarda info en la tabla Usuario
        User::create([
            'name' =>$datos['nombre'],
            'carnet' => '222222',
            'email' =>$datos['nombre'].'@gmail.com',
            'password' =>'$2y$10$OGQJXotRJOPr1mjmMzTr3.2TobzU0yoljfH4feBoWZ/otY96Oye/a',
            
        ])->assignRole('cliente');

        //Crear al Cliente
        Cliente::create([
            'nombre' => $datos['nombre'],
            'domicilio' => $datos['domicilio'],
            'imagen' => $datos['imagen'] ,
            'user_id' => User::latest('id')->first()->id
            
        ]);



        //Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');
        
        //Redireccuonar el usuario
        return redirect()->route('dashboard');

    }

    public function render()
    {
        $usuarios = User::all();
        
        return view('livewire.crear-usuario', [
            'usuarios' => $usuarios
        ]);
    }
}
