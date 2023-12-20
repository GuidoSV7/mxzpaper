<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <span>{{ __('CRUD DE pagos') }}</span>
            {{-- <span class="ml-auto">Bienvenido {{ auth()->user()->name }}</span> --}}
        </h2>
    </x-slot>

    @if (session()->has('mensaje'))
    <div class="uppercase border border-green bg-green-100 text-green-600
        font-bold p-2 my-3 rounded mx-8">
        {{ session('mensaje') }}
    </div>
    @endif



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:mostrar-pagos wire:poll>
            </div>
        </div>
    </div>
</x-app-layout>

