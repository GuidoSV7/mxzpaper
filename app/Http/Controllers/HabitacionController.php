<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Servicio;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use App\Exports\HabitacionesExport;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HabitacionController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('habitaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        return view('habitaciones.show',[
            'habitacion' =>$habitacion
        ]);
    }

    public function showcliente(Habitacion $habitacion)
    {
        return view('habitaciones.showcliente',[
            'habitacion' =>$habitacion
        ]);
    }

    public function reserva (Habitacion $habitacion){
        return view('habitaciones.reserva',[
            'habitacion' =>$habitacion
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion)
    
    {
        return view('habitaciones.edit',[
            'habitacion' =>$habitacion
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function lista(){
        
        return view('habitaciones.lista');
    }

    public function downloadExcel(Request $request)
    {
        
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        return Excel::download(new HabitacionesExport($searchTerm, $startDate, $endDate), 'habitaciones.xlsx');
    }


    
    public function downloadPDF(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

      

        $habitaciones = Habitacion::query()
        ->where(function ($query) use ($searchTerm) {
            $query->where('numero', 'LIKE', "%{$searchTerm}%")
                ->orWhere('id', 'LIKE', "%{$searchTerm}%");
        })
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        })
        ->get();
    

        $pdf = PDF::loadView('habitaciones.pdf', compact('habitaciones'));
        
        return $pdf->download('habitaciones.pdf');
    }



    public function obtenerServiciosDeHabitacion($habitacionId)
    {
        $habitacion = Habitacion::find($habitacionId);
        $serviciosDisponibles = Servicio::all();
        $serviciosSeleccionados = $habitacion->servicios;
    
        $servicios = $serviciosDisponibles->map(function ($servicio) use ($serviciosSeleccionados) {
            $servicio['seleccionado'] = $serviciosSeleccionados->contains($servicio);
            return $servicio;
        });
    
        return $servicios;
    }

    public function obtenerHabitacionesDeServicio($servicioId)
    {
        $servicio = Servicio::find($servicioId);
        $habitaciones = $servicio->habitaciones;

        return view('habitaciones.servicio', ['habitaciones' => $habitaciones]);
    }
}
