<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Exports\BitacorasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bitacoras.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bitacora $bitacora)
    {
        //
    }


    public function downloadExcel(Request $request)
    {
        

    
        return Excel::download(new BitacorasExport, 'bitacoras.xlsx');
    }


    
    public function downloadPDF()
    { 

        $bitacoras = Bitacora::all();  

        $pdf = PDF::loadView('bitacoras.pdf', compact('bitacoras'));
        
        return $pdf->download('bitacoras.pdf');
    }
}
