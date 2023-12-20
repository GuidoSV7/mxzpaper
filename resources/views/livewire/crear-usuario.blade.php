<form class="md:-1/2 space-y-5 px-5 py-2 border border-gray-200 rounded-lg" wire:submit.prevent='crearUsuario'>
    <div>
        <x-label for="name" :value="__('Nombre')" />

        <x-input id="name" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="name" 
        :value="old('name')" 
         />

         @error('name')
             {{$message}}
         @enderror

    </div>


    <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="email" 
        :value="old('email')" 
         />

         @error('email')
             {{$message}}
         @enderror

    </div>

    <div>
        <x-label for="password" :value="__('Contraseña')" />

        <x-input id="password" 
        class="block mt-1 w-full" 
        type="password"
        wire:model="password" 
        :value="old('password')" 
         />

         @error('password')
            {{$message}}
        @enderror

    </div>
    
    <div>
        {{-- <x-label for="imagen" :value="__('Foto de CI')" />

        <x-input id="imagen" 
        class="block mt-1 w-full" 
        type="file"
        wire:model="imagen" 
        :value="old('imagen')" 
        accept="image/*"
         /> --}}


         {{-- <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{$imagen -> temporaryUrl()}}" >
            @endif
         </div>

         @error('imagen')
            {{$message}}
        @enderror --}}

    </div> 

 
    {{--Prueba para mostrar CLientes-- FUNCIONA}}
    {{-- <div class="mt-4">
        <x-input-label for="cliente" :value="__('Cliente')" />
        <select 
            id="cliente"
            name="cliente"
            class = "rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
            focus:ring-indigo-200 focus:ring-opacity-50"
        >
            
            <option>--Seleccione</option>
            @foreach ( $clientes as $cliente )
               
                <option  value="{{$cliente->id}}">{{ $cliente->nombre}}</option>
                
            @endforeach

        </select>

    </div> --}}

    <x-button>
        Crear Usuario
    </x-button> 



</form> 
