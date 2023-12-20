<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='crearProducto'>
    <!-- Columna izquierda (mitad izquierda) -->
    <div class="md:w-1/2 m-8">
        <div>
            <x-label for="photourl" :value="__('Imagen del Producto')" />

            <x-input id="photourl"
                class="block mt-1 w-full"
                type="file"
                wire:model="photourl"
                :value="old('photourl')"
                accept="image/*"
            />

            <div class="my-5 w-80">
                @if ($photourl)
                    Imagen:
                    <img src="{{$photourl->temporaryUrl()}}" >
                @endif
            </div>

            @error('photourl')
                {{$message}}
            @enderror
        </div>
    </div>

    <!-- Columna derecha (mitad derecha) -->
    <div class="md:w-1/2 md:flex md:flex-col md:justify-between">
        <div>
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name"
                    class="block mt-1 w-full border border-white"
                    type="string"
                    wire:model="name"
                    :value="old('name')"
                />

                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                <x-label for="description" :value="__('Descripcion')" />

                <x-input id="description"
                    class="block mt-1 w-full border border-white"
                    type="string"
                    wire:model="description"
                    :value="old('description')"
                />

                @error('description')
                    {{$message}}
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="price" :value="__('Precio')" />

                <x-input id="price"
                    class="block mt-1 w-full border border-white"
                    type="integer"
                    wire:model="price"
                    :value="old('price')"
                />

                @error('price')
                    {{$message}}
                @enderror
            </div>




            <x-button class="w-full text-ali my-3">
                Crear producto
            </x-button>
        </div>

    </div>
</form>
