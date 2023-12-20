<?php

namespace App\Http\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Habitacion;
use App\Models\User;
use Livewire\WithFileUploads;

class CrearReserva extends Component
{

    public $reserva;
    public $carnet;
    public $nombre;
    public $telefono;
    public $correo;
    public $direccion;
    public $fecha_llegada;
    public $fecha_salida;
    public $user_id;
    public $habitacion_id;
    public $estado;
    public $users;
    public $habitaciones;

    use WithFileUploads;

    protected $rules = [
        'carnet' => 'required|integer',
        'nombre' => 'required|string',
        'telefono' => 'required|integer',
        'correo' => 'nullable|string',
        'direccion' => 'nullable|string',
        'fecha_llegada' => 'nullable|date',
        'fecha_salida' => 'nullable|date',
        'user_id' => 'required|integer',
        'habitacion_id' => 'required|integer',


    ];

    public function mount(Reserva $reserva){
        $this->users = User::all();
        $this->habitaciones = Habitacion::all();
        



    }

    public function crearReserva()
    {
        $datos = $this->validate();


        // Crear la Reserva
        $reserva = Reserva::create([
            'carnet' => $datos['carnet'],
            'nombre' => $datos['nombre'],
            'telefono' => $datos['telefono'],
            'correo' => $datos['correo'],
            'direccion' => $datos['direccion'],
            'fecha_llegada' => $datos['fecha_llegada'],
            'fecha_salida' => $datos['fecha_salida'],
            'user_id' => $datos['user_id'],
            'habitacion_id' => $datos['habitacion_id'],
            'estado' => 'Completado',
        ]);


        // Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        Bitacora::create([
            'descripcion' => 'Se ha creado una reserva',
            'nombre_registro' => auth()->user()->name,
        ]);

        // Redireccionar al usuario
        return redirect()->route('dashboard');
    }
    
    public function render()
    {   $users = User::all();
        $habitaciones = Habitacion::all();
        return view('livewire.crear-reserva',[
            'users' => $users,
        ]);
    }
}
