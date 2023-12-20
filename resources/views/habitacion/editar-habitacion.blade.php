<form class="md:-1/2 space-y-5" wire:submit.prevent='editarTecnico'>
    <div>
        <x-label for="nombre" :value="__('Nombre')" />

        <x-input id="nombre" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="nombre" 
        :value="old('nombre')" 
         />

         @error('nombre')
             {{$message}}
         @enderror

    </div>

    <div>
        <x-label for="domicilio" :value="__('Domicilio')" />

        <x-input id="domicilio" 
        class="block mt-1 w-full" 
        type="text"
        wire:model="domicilio" 
        :value="old('domicilio')" 
         />

         @error('domicilio')
            {{$message}}
        @enderror

    </div>
    
    <div>
        <x-label for="imagen" :value="__('Foto de CI')" />

        <x-input id="imagen" 
        class="block mt-1 w-full" 
        type="file"
        wire:model="imagen_nueva" 
        :value="old('imagen')" 
        accept="image/*"
         />

        <div class="my-5 w-80">
            <x-label :value="__('Imagen Actual')"/>
            
            <img src="{{asset('storage/tecnicos/' . $imagen ) }}" alt="{{'Imagen Tecnico'}}">
        </div>

         <div class="my-5 w-80">
            @if ($imagen_nueva)
                Imagen Nueva:
                <img src="{{$imagen_nueva -> temporaryUrl()}}" >
            @endif
         </div>

         @error('imagen_nueva')
            {{$message}}
        @enderror

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
        Guardar Cambios
    </x-button>



</form>