<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\UserController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\GraficoController;
use App\Models\Habitacion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('auth/login');
    return view('usuarios.index');
});

use App\Http\Controllers\TuControlador;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [GraficoController::class, 'dashboard'])->name('dashboard');
});



//Vista administrador
Route::get('/usuarios/create', [UserController::class, 'create'])->middleware(['auth'])->name('usuarios.create');
Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->middleware(['auth'])->name('usuarios.edit');
Route::get('/usuarios/{usuario}/show', [UserController::class, 'show'])->middleware(['auth'])->name('usuarios.show');
Route::get('/usuarios/lista', [UserController::class, 'lista'])->middleware(['auth'])->name('usuarios.lista');

//Vista usuario
Route::get('/', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/{producto}/show', [ProductController::class, 'showcliente'])->name('productoscliente.show');
Route::get('/{producto}/reserva', [ProductController::class, 'reserva'])->name('productos.reserva');

Route::get('/{habitacion}/show', [HabitacionController::class, 'showcliente'])->name('habitacionescliente.show');
Route::get('/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index.');
Route::get('/{habitacion}/reserva', [HabitacionController::class, 'reserva'])->name('habitaciones.reserva');


//Vista administrador
Route::get('/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
Route::get('/habitaciones/{habitacion}/show', [HabitacionController::class, 'show'])->name('habitaciones.show');
Route::get('/habitaciones/{habitacion}/edit', [HabitacionController::class, 'edit'])->name('habitaciones.edit');
Route::get('/habitaciones/lista', [HabitacionController::class, 'lista'])->name('habitaciones.lista');



//Reservas
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{reserva}/show', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
Route::get('/reservas/lista', [ReservaController::class, 'lista'])->name('reservas.lista');
Route::post('/guardar-datos', [ReservaController::class, 'guardarDatos'])->name('guardar-datos');

//Productos
Route::get('/productos/create', [ProductController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/show', [ProductController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductController::class, 'edit'])->name('productos.edit');
Route::get('/productos/lista', [ProductController::class, 'lista'])->name('productos.lista');

//Categorias
Route::get('/categorias/create', [CategoryController::class, 'create'])->name('categorias.create');
Route::get('/categorias/{categoria}/show', [CategoryController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoryController::class, 'edit'])->name('categorias.edit');
Route::get('/categorias/lista', [CategoryController::class, 'lista'])->name('categorias.lista');





//Bitacora
Route::get('/bitacoras', [BitacoraController::class, 'index'])->name('bitacoras.index');

//Reportes de usuario
Route::get('/exportar-usuarios-pdf', [UserController::class, 'downloadPDF'])->name('exportar.usuarios.pdf');
Route::get('usuarios/export/', [UserController::class, 'downloadExcel'])->name('exportar.usuarios.xlsx');

//Reportes de habitaicones
Route::get('/exportar-habitaciones-pdf', [HabitacionController::class, 'downloadPDF'])->name('exportar.habitaciones.pdf');
Route::get('habitaciones/export/', [HabitacionController::class, 'downloadExcel'])->name('exportar.habitaciones.xlsx');


//Reportes de products
Route::get('/exportar-productos-pdf', [ProductController::class, 'downloadPDF'])->name('exportar.productos.pdf');
Route::get('productos/export/', [ProductController::class, 'downloadExcel'])->name('exportar.productos.xlsx');

//Reportes de categorias
Route::get('/exportar-categorias-pdf', [CategoryController::class, 'downloadPDF'])->name('exportar.categorias.pdf');
Route::get('categorias/export/', [CategoryController::class, 'downloadExcel'])->name('exportar.categorias.xlsx');


//De esta forma nunca funcinó bien el tiempo real
// Route::get('/exportar-usuarios-pdf/{{$searchTerm }}', [MostrarUsuarios::class,'exportUsersPDF'])->name('exportar.usuarios.pdf');



//Reportes de la Bitacora
Route::get('/exportar-bitacoras-pdf', [BitacoraController::class, 'downloadPDF'])->name('exportar.bitacoras.pdf');
Route::get('bitacoras/export/', [BitacoraController::class, 'downloadExcel'])->name('exportar.bitacoras.xlsx');
