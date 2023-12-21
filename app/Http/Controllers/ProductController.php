<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Exports\ProductReport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;

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

    public function showcliente(Product $producto)
    {
        return view('productos.showcliente',[
            'producto' =>$producto
        ]);
    }

    public function reserva (Product $producto){
        return view('productos.reserva',[
            'producto' =>$producto
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

    public function generarqrvista(Product $producto)
    {
        //Datos del Producto
        $producto = Product::find($producto->id);




        return view('productos.generarqrvista',[
            'producto' =>$producto
        ]);


    }

    public function generarqr(Request $request)
    {
        $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";

        // Obtén los datos del producto_id
        $producto = Product::find($request->producto_id);



        $requestData = [
            'tcCommerceID' => "d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c",
            'tnMoneda' => 2,
            'tnTelefono' => "78452415",
            'tcCorreo' => "josalejandroapp2017@gmail.com",
            'tcNombreUsuario' => "Jose Alejandro Sahonero Salas",
            'tnCiNit' => "13210479",
            'tcNroPago' => "test-1300",
            'tnMontoClienteEmpresa' => "100",
            'tcUrlCallBack' => "http://localhost:8000/",
            'tcUrlReturn' => "http://localhost:8000/",

        ];

        $laHeader = [
            'Accept' => 'application/json',
        ];

        try {
            $laResponse = Http::post($lcUrl, $requestData, $laHeader);
            $laResult = $laResponse->json();

            $laValues = explode(";", $laResult['values'])[1];
            $laQrImage = "data:image/png;base64," . json_decode($laValues)->qrImage;

            return view('productos.qrgenerado', ['laQrImage' => $laQrImage]);

        } catch (\Exception $error) {
            return response()->json([
                'ok' => false,
                'msg' => 'Hable con el administrador',
            ], 500);
        }
    }



    public function lista(){

        return view('productos.lista');
    }

    public function downloadExcel(Request $request)
    {

        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        return Excel::download(new ProductReport($searchTerm, $startDate, $endDate), 'products.xlsx');
    }



    public function downloadPDF(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');



        $productos = Product::query()
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


        $pdf = PDF::loadView('productos.pdf', compact('productos'));

        return $pdf->download('products.pdf');
    }

}
