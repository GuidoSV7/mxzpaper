<form class="md:flex space-y-5 my-4 mx-4" wire:submit.prevent='editarCategoria'>

    <div>
        <div>

        <div class="mt-4">
            <x-label for="name" :value="__('name')" />

            <x-input id="name"
                class="block mt-1 w-full border border-white"
                type="text"
                wire:model="name"
                :value="old('name')"
            />

            @error('name')
                {{$message}}
            @enderror
        </div>







        <x-button class="w-full text-ali my-3">
            Actualizar categoria
        </x-button>
    </div>


</form>
