<?php

namespace App\Http\Controllers;

use App\Exports\CategoryReport;
use App\Models\Category;


use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();

        return view('categorias.index', [
            'categorias' => $categorias,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');

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
    public function show(Category $categoria)
    {
        return view('categorias.show',[
            'categoria' =>$categoria
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoria)
    {

        return view('categorias.edit',[
            'categoria' =>$categoria
        ]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function lista(){

        return view('categorias.lista');
    }

    public function downloadExcel(Request $request)
    {

        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        return Excel::download(new CategoryReport($searchTerm, $startDate, $endDate), 'categories.xlsx');
    }



    public function downloadPDF(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');



        $categorias = Category::query()
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


        $pdf = PDF::loadView('categorias.pdf', compact('categorias'));

        return $pdf->download('categorias.pdf');
    }

}
