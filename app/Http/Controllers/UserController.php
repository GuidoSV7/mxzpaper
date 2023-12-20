<?php

namespace App\Http\Controllers;


use App\Models\User;


//Exportar
use App\Models\Habitacion;
use App\Exports\UserReport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class UserController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {// Obtener el usuario autenticado

        $productos = Product::all();




        return view('usuarios.index', [
            'productos' => $productos
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
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
    public function show(User $usuario)
    {
        return view('usuarios.show',[
            'usuario' =>$usuario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit',[
            'usuario' =>$usuario
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

        return view('usuarios.lista');
    }

    public function downloadExcel(Request $request)
    {

        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        return Excel::download(new UserReport($searchTerm, $startDate, $endDate), 'users.xlsx');
    }



    public function downloadPDF(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');



        $users = User::query()
        ->where(function ($query) use ($searchTerm) {
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('id', 'LIKE', "%{$searchTerm}%");
        })
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        })
        ->get();


        $pdf = PDF::loadView('usuarios.pdf', compact('users'));

        return $pdf->download('users.pdf');
    }

}
