<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='editarHabitacion'>
    <!-- Columna izquierda (mitad izquierda) -->
    <div class="md:w-1/2 m-8">
        <div>
            <x-label for="url_imagen" :value="__('Imagen de la Habitacion')" />

            <x-input id="url_imagen" 
                class="block mt-1 w-full" 
                type="file"
                wire:model="url_imagen_nueva" 
                :value="old('url_imagen')" 
                accept="image/*"
            />
            
            <div class="my-5 w-80">
                <x-label :value="__('Imagen Actual')"/>
                    <img src="{{asset('storage/habitaciones/' . $url_imagen)}}" alt="{{' Imagen Habitacion '}}">
               
            </div>

            <div class="my-5 w-80">
                @if ($url_imagen_nueva)
                    Imagen Nueva:
                    <img src="{{$url_imagen_nueva->temporaryUrl()}}" >
                @endif
            </div>

            @error('url_imagen_nueva')
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
                <select id="estado_habitacion" class="block mt-1 w-full border border-white" wire:model="estado_habitacion_id">
                    <option>-- Seleccione --</option>
                    @foreach ($estadoHabitaciones as $estadohabitacion)
                        <option value="{{ $estadohabitacion->id }}" {{ $estadohabitacion->id == $estado_habitacion_id ? 'selected' : '' }}>
                            {{ $estadohabitacion->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="mt-4">
                <x-label for="tipo_habitacion" :value="__('Tipo Habitacion')" />
                <select id="tipo_habitacion" class="block mt-1 w-full border border-white" wire:model="tipo_habitacion_id">
                    <option>-- Seleccione --</option>
                    @foreach ($tipoHabitaciones as $tipohabitacion)
                        <option value="{{ $tipohabitacion->id }}" {{ $tipohabitacion->id == $tipo_habitacion_id ? 'selected' : '' }}>
                            {{ $tipohabitacion->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            
           
            <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">

            <div class="mt-4">
                <x-label for="servicios" :value="__('Servicio')" />

                    @foreach ($servicios as $servicio)
                        @php
                            $isChecked = in_array($servicio->id, $serviciosSeleccionados);
                           
                        @endphp
                        <label class="flex items-center">
                            <input type="checkbox" value="{{ $servicio->id }}" wire:model="serviciosSeleccionados"  @if ($isChecked) checked @endif />
                            <span class="ml-2">{{ $servicio->descripcion }}</span>
                        </label>
                    @endforeach
                    @dump($serviciosSeleccionados)

            </div>
        

            <x-button class="w-full text-ali my-3">
                Actualizar Habitacion
            </x-button> 
        </div>

        


    </div>
</form>
