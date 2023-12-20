<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create');
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
    public function show(Reserva $reserva)
    {

        return view('reservas.show',[
            'reserva' =>$reserva
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        return view('reservas.edit',[
            'reserva' =>$reserva
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function lista(){

        return view('reservas.lista');
    }


    public function guardarDatos(Request $request)
    {
        // Obtener los datos del formulario
        $carnet = $request->input('carnet');
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $direccion = $request->input('direccion');


        // Guardar los datos en la base de datos
        $pay= new Pay();
        $pay->title = $nombre;
        $pay-> description = $carnet;
        $pay->total = $nombre;
        $pay->iduser = auth()->user()->id; // Obtener el ID del usuario logueado
        // $reserva->estado = "Procesando";
        // Guardar la reserva
        $pay->save();

        // Redirigir a una página de éxito o mostrar un mensaje de confirmación
        return redirect('/')->with('success', 'Se realizó la reserva correctamente');
    }
}
