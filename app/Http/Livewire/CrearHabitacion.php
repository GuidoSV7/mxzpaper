<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Servicio;
use App\Models\Habitacion;
use Livewire\WithFileUploads;
use App\Models\TipoHabitacion;
use App\Models\EstadoHabitacion;

class CrearHabitacion extends Component
{
    public $numero;
    public $piso;
    public $estado_habitacion;
    public $tipo_habitacion;
    public $servicios = [];
    public $url_imagen;
    public $selectedServicios  = [];

    use WithFileUploads;

    protected $rules = [
        'numero' => 'required|integer',
        'piso' => 'required|integer',
        'url_imagen' => 'required|image|max:1024',
        'estado_habitacion' => 'required|integer',
        'tipo_habitacion' => 'required|integer',
        'servicios' => 'required|array',
        'selectedServicios' => 'required|array',
    ];

    public function mount()
    {
        $this->servicios = Servicio::all();
    }

    public function crearHabitacion()
    {
        $datos = $this->validate();

        // Almacenar imagen
        $url_imagen = $this->url_imagen->store('public/habitaciones');
        $datos['url_imagen'] = str_replace('public/habitaciones/', '', $url_imagen);

        // Crear la Habitación
        $habitacion = Habitacion::create([
            'numero' => $datos['numero'],
            'piso' => $datos['piso'],
            'url_imagen' => $datos['url_imagen'],
            'estado_habitacion_id' => $datos['estado_habitacion'],
            'tipo_habitacion_id' => $datos['tipo_habitacion'],
        ]);

        // Adjuntar servicios a la habitación
        $habitacion->servicios()->sync($this->selectedServicios);

        // Crear un mensaje
        session()->flash('mensaje', 'Se publicó correctamente');

        Bitacora::create([
            'descripcion' => 'Se ha creado una habitacion',
            'nombre_registro' => auth()->user()->name,
        ]);

        // Redireccionar al usuario
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $estadoHabitaciones = EstadoHabitacion::all();
        $servicios = Servicio::all();
        $tipoHabitaciones = TipoHabitacion::all();
       

        return view('livewire.crear-habitacion', [
            'estadoHabitaciones' => $estadoHabitaciones,
            'servicios' => $servicios,
            'tipoHabitaciones' => $tipoHabitaciones,
        ]);
    }
}
