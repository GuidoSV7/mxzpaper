<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[ApiController::class, 'users']); //http://127.0.0.1:8000/api/users
Route::post('/login',[ApiController::class, 'login']); //http://127.0.0.1:8000/api/login
Route::post('/users/create', [ApiController::class, 'createUser'])->name('api.users.create'); //http://127.0.0.1:8000/api/users/create
Route::get('/habitaciones',[ApiController::class, 'habitaciones']); //http://127.0.0.1:8000/api/habitaciones
Route::get('/habitacionesDisponibles',[ApiController::class, 'habitacionesDisponibles']); //http://127.0.0.1:8000/api/habitacionesDisponibles
Route::post('/habitaciones/realizar', [ApiController::class, 'RealizarReserva'])->name('api.habitaciones.realizar'); //http://127.0.0.1:8000/api/habitaciones/realizar
Route::post('/reservas/obtener',[ApiController::class, 'ObtenerReservas'])->name('api.obtener.reservas'); //http://127.0.0.1:8000/api/reservas/obtener