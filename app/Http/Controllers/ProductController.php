<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();

        return view('productos.index', [
            'productos' => $productos,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');

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
    public function show(Product $producto)
    {
        return view('productos.show',[
            'producto' =>$producto
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $producto)
    {
        return view('productos.edit',[
            'producto' =>$producto
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function lista(){

        return view('productos.lista');
    }

    public function downloadExcel(Request $request)
    {

        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        return Excel::download(new Product($searchTerm, $startDate, $endDate), 'products.xlsx');
    }



    public function downloadPDF(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');



        $products = Product::query()
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


        $pdf = PDF::loadView('productos.pdf', compact('products'));

        return $pdf->download('products.pdf');
    }

}
