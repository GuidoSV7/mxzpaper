<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Servicio;
use App\Models\Habitacion;
use Livewire\WithFileUploads;
use App\Models\TipoHabitacion;
use App\Models\EstadoHabitacion;
use App\Http\Controllers\HabitacionController;

class EditarHabitacion extends Component
{
    public $habitacion;
    public $numero;
    public $piso;
    public $estado_habitacion;
    public $tipo_habitacion_id;
    public $servicios = [];
    public $url_imagen;
    public $url_imagen_nueva;
    public $serviciosSeleccionados = [];
    public $estado_habitacion_id;

    use WithFileUploads;


    protected $rules = [
        'numero' => 'required|integer',
        'piso' => 'required|integer',
        
        'url_imagen_nueva' => 'nullable|image',
        'tipo_habitacion_id' => 'nullable|integer',
        'estado_habitacion_id' => 'nullable|integer',
        'servicios' => 'required|array',
        'serviciosSeleccionados' => 'required|array',
    ];

    public function mount(Habitacion $habitacion)
    {
        $this->habitacion = $habitacion;
        $this->url_imagen = $habitacion->url_imagen;
        $this->numero = $habitacion->numero;
        $this->piso = $habitacion->piso;
        $this->serviciosSeleccionados = $habitacion->servicios->pluck('id')->toArray();
        // dd($this->serviciosSeleccionados);
        $this->servicios = Servicio::all();
        $this->tipo_habitacion_id = $habitacion->tipo_habitacion_id;
        $this->estado_habitacion_id = $habitacion->estado_habitacion_id;

        

    }

    public function editarHabitacion()
    {   

        $datos = $this->validate();
    if($this->url_imagen_nueva){
        $url_imagen = $this->url_imagen_nueva->store('public/habitaciones');
        $datos['url_imagen'] = str_replace('public/habitaciones', '', $url_imagen);
    }
    
    // Buscar la habitación por su ID
    
    $habitacion = Habitacion::find($this->habitacion->id);
    

    // Actualizar los atributos de la habitación
    $habitacion->numero = $datos['numero'];
    $habitacion->piso = $datos['piso'];
    $habitacion->estado_habitacion_id = $datos['estado_habitacion_id'];
    $habitacion->tipo_habitacion_id = $datos['tipo_habitacion_id'];
    $habitacion->servicios()->sync($datos['serviciosSeleccionados']);
    
    $habitacion->url_imagen = $datos['url_imagen'] ?? $habitacion->url_imagen;
   
    $habitacion->save();

    // Manejar la imagen de la habitación si se ha cargado una nueva
    // if ($datos['url_imagen']) {
    //     // Guardar la imagen y actualizar la URL en la habitación
    //     $urlImagen = $datos['url_imagen']->store('habitaciones', 'public');
    //     $habitacion->url_imagen = $urlImagen;
    //     $habitacion->save();
    // }
        
    Bitacora::create([
        'descripcion' => 'Se ha editado una habitacion',
        'nombre_registro' => auth()->user()->name,
    ]);


    //redireccionar
    session()->flash('mensaje','Se actualizó correctamente');
    return redirect()->route('habitaciones.lista');

}


    public function render()
    { $estadoHabitaciones = EstadoHabitacion::all();
        $servicios = Servicio::all();
        $tipoHabitaciones = TipoHabitacion::all();

        return view('livewire.editar-habitacion', [
            'habitacion' => $this->habitacion,
            'estadoHabitaciones' => $estadoHabitaciones,
            'servicios' => $servicios,
            'tipoHabitaciones' => $tipoHabitaciones,
            'serviciosSeleccionados' => $this->serviciosSeleccionados,

        ]);
    }
}
