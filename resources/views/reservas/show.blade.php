<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{-- <span>{{ __('NOMBRE') }}</span> --}}
            {{-- <span class="ml-auto">Bienvenido {{ auth()->user()->name }}</span> --}}
            {{'Reserva: '.$reserva -> nombre}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('mostrar-reserva', ['reserva' => $reserva])
            </div>
        </div>
    </div>
</x-app-layout>

