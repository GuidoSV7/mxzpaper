<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Bitacora;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class EditarUsuario extends Component
{
    public $name;
    public $email;
    public $password;
    public $user_id;
    public $role;

    use WithFileUploads;


    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string',
        'password' => 'required|string',
        'role' => 'required|integer',    
    ];


    public function mount(User $usuario){
        $this->user_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->password = $usuario->password;
        $this->role = intval($usuario->roles->first()->pivot->role_id);


    }

    public function editarUsuario(){
        $datos = $this->validate();


        //Encontrar el usuario a editar
        $usuario = User::find($this->user_id);
        //asignar valores
        $usuario->name = $datos['name'];
        $usuario->email = $datos['email'];
        $usuario->password = bcrypt($datos['password']);
        

        //Guardar Usuario
        $usuario->save();

            // Actualizar el rol del usuario
        $role = Role::findById($datos['role']);
        $usuario->syncRoles([$role]);

        Bitacora::create([
            'descripcion' => 'Se ha editado un usuario',
            'nombre_registro' => auth()->user()->name,
        ]);
        
        //redireccionar
        session()->flash('mensaje','Se actualizó correctamente');
        return redirect()->route('usuarios.lista');
    }



    
    public function render(User $usuario)
    {
        $usuario = User::find($this->user_id); // Obtén el usuario que deseas editar, reemplaza '1' con el ID correcto
        
        $role = intval($usuario->roles->first()->pivot->role_id);
        // Obtén el primer rol asignado al usuario

        return view('livewire.editar-usuario', [
            'role' => $role, // Pasa el rol del usuario como parte de los datos de la vista
        ]);
    }
}
