<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='editarReserva'>
   
        <div>
            <div>
                <x-label for="carnet" :value="__('Carnet')" />
            
                <x-input id="carnet" 
                    class="block mt-1 w-full border border-white" 
                    type="number"
                    wire:model="carnet" 
                    :value="old('carnet')" 
                />
            
                @error('carnet')
                    {{$message}}
                @enderror
            </div>
            
            <div class="mt-4">
                <x-label for="nombre" :value="__('Nombre')" />
            
                <x-input id="nombre" 
                    class="block mt-1 w-full border border-white" 
                    type="text"
                    wire:model="nombre" 
                    :value="old('nombre')" 
                />
            
                @error('nombre')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="telefono" :value="__('Telefono')" />
            
                <x-input id="telefono" 
                    class="block mt-1 w-full border border-white" 
                    type="text"
                    wire:model="telefono" 
                    :value="old('telefono')" 
                />
            
                @error('telefono')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="correo" :value="__('Correo')" />
            
                <x-input id="correo" 
                    class="block mt-1 w-full border border-white" 
                    type="email"
                    wire:model="correo" 
                    :value="old('correo')" 
                />
            
                @error('correo')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="direccion" :value="__('Direccion')" />
            
                <x-input id="direccion" 
                    class="block mt-1 w-full border border-white" 
                    type="text"
                    wire:model="direccion" 
                    :value="old('direccion')" 
                />
            
                @error('direccion')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="fecha_llegada" :value="__('Fecha de Llegada')" />
                
                <x-input id="fecha_llegada" 
                    class="block mt-1 w-full border border-white" 
                    type="date"
                    wire:model="fecha_llegada" 
                    :value="old('fecha_llegada')" 
                />
                
                @error('fecha_llegada')
                    {{$message}}
                @enderror
            </div>
            
            <div class="mt-4">
                <x-label for="fecha_salida" :value="__('Fecha de Salida')" />
                
                <x-input id="fecha_salida" 
                    class="block mt-1 w-full border border-white" 
                    type="date"
                    wire:model="fecha_salida" 
                    :value="old('fecha_salida')" 
                />
                
                @error('fecha_salida')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="estado" :value="__('Estado Habitacion')" />
                <select id="estado" class="block mt-1 w-full border border-white" wire:model="estado">
                    <option value="">-- Seleccione --</option>
                    <option value="Completado">Completado</option>
                    <option value="Procesando">Procesando</option>
                </select>
            </div>
            

            
  

            <x-button class="w-full text-ali my-3">
                Actualizar Reserva
            </x-button> 
        </div>

    
</form>
