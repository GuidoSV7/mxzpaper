<form class="md:-1/2 space-y-5 px-5 py-2 border border-gray-200 rounded-lg" wire:submit.prevent='editarUsuario'>
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
        <x-label for="role" :value="__('Rol')" />

        <select name="role" id="role" wire:model="role" class="block mt-1 w-full">
            <option value=1 @if ($role === 1) selected @endif>Administrador</option>
            <option value=2 @if ($role === 2) selected @endif>Cliente</option>
            <option value=3 @if ($role === 3) selected @endif>Usuario</option>
        </select>

        @error('role')
            {{$message}}
        @enderror
    </div>




    <x-button class="my-4">
        Guardar Cambios
    </x-button>



</form>
