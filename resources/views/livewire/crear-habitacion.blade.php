<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='crearHabitacion'>
    <!-- Columna izquierda (mitad izquierda) -->
    <div class="md:w-1/2 m-8">
        <div>
            <x-label for="url_imagen" :value="__('Imagen de la Habitacion')" />

            <x-input id="url_imagen" 
                class="block mt-1 w-full" 
                type="file"
                wire:model="url_imagen" 
                :value="old('url_imagen')" 
                accept="image/*"
            />

            <div class="my-5 w-80">
                @if ($url_imagen)
                    Imagen:
                    <img src="{{$url_imagen->temporaryUrl()}}" >
                @endif
            </div>

            @error('url_imagen')
                {{$message}}
            @enderror
        </div>
    </div>

    <!-- Columna derecha (mitad derecha) -->
    <div class="md:w-1/2 md:flex md:flex-col md:justify-between">
        <div>
            <div>
                <x-label for="numero" :value="__('Numero')" />
            
                <x-input id="numero" 
                    class="block mt-1 w-full border border-white" 
                    type="integer"
                    wire:model="numero" 
                    :value="old('numero')" 
                />
            
                @error('numero')
                    {{$message}}
                @enderror
            </div>
            
            <div class="mt-4">
                <x-label for="piso" :value="__('Piso')" />
            
                <x-input id="piso" 
                    class="block mt-1 w-full border border-white" 
                    type="integer"
                    wire:model="piso" 
                    :value="old('piso')" 
                />
            
                @error('piso')
                    {{$message}}
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="estado_habitacion" :value="__('Estado Habitacion')" />
                <select id="estado_habitacion" class="block mt-1 w-full border border-white" wire:model="estado_habitacion">
                <option>-- Seleccione --</option>
                @foreach ($estadoHabitaciones as $estadohabitacion)
                    <option value="{{ $estadohabitacion->id }}">{{ $estadohabitacion->descripcion }}</option>
                @endforeach
                </select>
            </div>
            
            <div class="mt-4">
                <x-label for="tipo_habitacion" :value="__('Tipo Habitacion')" />
                <select id="tipo_habitacion" class="block mt-1 w-full border border-white" wire:model="tipo_habitacion">
                    <option>-- Seleccione --</option>
                    @foreach ($tipoHabitaciones as $tipohabitacion)
                        <option value="{{ $tipohabitacion->id }}">{{ $tipohabitacion->descripcion }}</option>
                    @endforeach
                </select>
            </div>
            
            
            
            <div class="mt-4">
                <x-label for="servicios" :value="__('Servicios')" />
            
                @foreach ($servicios as $servicio)
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" value="{{ $servicio->id }}"  wire:model="selectedServicios">
                        <span class="ml-2">{{ $servicio->descripcion }}</span>
                    </label>
                @endforeach
            </div>
            
         
            
                @error('servicios')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>  
        

            <x-button class="w-full text-ali my-3">
                Crear Habitacion
            </x-button> 
        </div>

    </div>
</form>
