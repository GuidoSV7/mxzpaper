<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='crearCategoria'>


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






            <x-button class="w-full text-ali my-3">
                Crear Categoria
            </x-button>
        </div>

    </div>
</form>
