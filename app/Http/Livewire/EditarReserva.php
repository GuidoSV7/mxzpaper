<?php
namespace App\Http\Livewire;

use App\Models\Reserva;
use Livewire\Component;
use App\Models\Bitacora;
use Livewire\WithFileUploads;

class EditarReserva extends Component
{ 
    public $reserva;
    public $carnet;
    public $nombre;
    public $telefono;
    public $correo;
    public $direccion;
    public $fecha_llegada;
    public $fecha_salida;
    public $estado;



    use WithFileUploads;


    protected $rules = [
        'carnet' => 'required|integer',
        'nombre' => 'required|string',
        'telefono' => 'required|integer',
        'correo' => 'nullable|string',
        'direccion' => 'nullable|string',
        'fecha_llegada' => 'nullable|date',
        'fecha_salida' => 'nullable|date',
        'estado' => 'required|string',
    ];
    

    public function mount(Reserva $reserva){
        $this->carnet = $reserva->carnet;
        $this->nombre = $reserva->nombre;
        $this->telefono = $reserva->telefono;
        $this->correo = $reserva->correo;
        $this->direccion = $reserva->direccion;
        $this->fecha_llegada = $reserva->fecha_llegada;
        $this->fecha_salida = $reserva->fecha_salida;
        $this->estado = $reserva->estado;



    }

    public function editarReserva(){
        $datos = $this->validate();


        //Encontrar la reserva a editar
        $reserva = Reserva::find($this->reserva->id);
        //asignar valores
        $reserva->carnet = $datos['carnet'];
        $reserva->correo = $datos['correo'];
        $reserva->nombre = $datos['nombre'];
        $reserva->telefono = $datos['telefono'];
        $reserva->direccion = $datos['direccion'];
        $reserva->fecha_llegada = $datos['fecha_llegada'];
        $reserva->fecha_salida = $datos['fecha_salida'];
        $reserva->estado = $datos['estado'];

        

        //Guardar Reserva
        $reserva->save();

        Bitacora::create([
            'descripcion' => 'Se ha editado una reserva',
            'nombre_registro' => auth()->user()->name,
        ]);
        
        //redireccionar
        session()->flash('mensaje','Se actualizó correctamente');
        return redirect()->route('reservas.lista');
    }
    public function render(Reserva $reserva)
    {   $reserva = Reserva::find($this->reserva->id);

        return view('livewire.editar-reserva', [
            'reserva' => $this->reserva
        ]);
    }
}
