<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    //Habitaciones
    public function habitaciones(){
            $habitaciones = Habitacion::all();
            return response()->json($habitaciones);
    }

    public function habitacionesDisponibles()
    {
        $habitacionesDisponibles = Habitacion::where('estado_habitacion_id', 1)
                                             ->get();
    
        return response()->json($habitacionesDisponibles);
    }

    public function RealizarReserva(Request $request){
        $data = json_decode($request->getContent());

        // Validar los datos recibidos
        $request->validate([
            'carnet' => 'required|integer',
            'nombre' => 'required|string',
            'telefono' => 'required|integer',
            'correo' => 'nullable|string',
            'direccion' => 'nullable|string',
            'user_id' => 'required|integer',
            'habitacion_id' => 'required|integer',
        ]);

        // Crear el nuevo usuario
        $reserva = new Reserva();
        $reserva->carnet = $data->carnet;
        $reserva->nombre = $data->nombre;
        $reserva->telefono = $data->telefono;
        $reserva->correo = $data->correo;
        $reserva->direccion = $data->direccion;
        $reserva->user_id = $data->user_id;
        $reserva->habitacion_id = $data->habitacion_id;
        $reserva->estado = "Procesando";
        
        
        $reserva->save();
        
       
        return response()->json([
            'status' => 1,
            'msg' => 'Reserva creada exitosamente',
        ]); 
    }


    public function ObtenerReservas(Request $request) {

            // Obtener las reservas del usuario actual
            $reservas = Reserva::where('user_id', $request->id)->get();
    
            // Devolver las reservas en formato JSON
            return response()->json($reservas);
 
    }


    



     public function users(Request $request)
    {
        if($request ->has('active')){
            $users = User::where('active', true)->get();
        }else{
            $users = User::all();
        }
        return response()->json($users);
    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $response = ["status" => 0, "msg" => ""];
        $data = json_decode($request->getContent());
        $user = User::where('email', $data->email)->first();

        if($user){
            if(Hash::check($data->password, $user->password)){

                $token = $user->createToken("example");

                $response["status"] = 1;
                $response["id"] = $user->id;
                $response["msg"] = $token->plainTextToken;

                
            }else{
                $response["msg"] = "Contraseña incorrecta";

            }

        }else{
            $response["msg"] = "Usuario no encontrado.";
        }

        return response()->json($response);
    }

    public function createUser(Request $request)
    {
        $data = json_decode($request->getContent());

        // Validar los datos recibidos
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear el nuevo usuario
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();
        
        // Asignar el rol de "Usuario"
        $role = Role::where('name', 'Usuario')->first();
        $user->roles()->attach($role);

        return response()->json([
            'status' => 1,
            'msg' => 'Usuario creado exitosamente',
        ]);
    }





  
}
