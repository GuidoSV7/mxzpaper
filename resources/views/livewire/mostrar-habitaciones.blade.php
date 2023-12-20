<div>
    <div class="py-5 mx-5">
        <input type="text" wire:model="searchTerm" placeholder="Buscar por nombre o numero de habitacion" class="w-full p-2 border border-gray-300 rounded-md">
    </div>

    <div class="flex justify-between mt-4 mx-5">
        <div class="space-x">
            <input type="date" wire:model="startDate" class="p-2 border border-gray-300 rounded-md">
            <input type="date" wire:model="endDate" class="p-2 border border-gray-300 rounded-md">
            {{-- <button wire:model="filterByDate" class="px-4 py-2 bg-blue-500 text-white rounded-md">Filtrar</button> --}}
        </div>

        <div class="my-2">

            <a href="{{ route('exportar.habitaciones.pdf', ['searchTerm' => $searchTerm, 'startDate' => $startDate, 'endDate' => $endDate]) }}" class="px-4 py-2 bg-red-500 text-white rounded-md">Descargar PDF</a>

            
            <a href={{ route('exportar.habitaciones.xlsx', ['searchTerm' => $searchTerm, 'startDate' => $startDate, 'endDate' => $endDate])}} class="px-4 py-2 bg-green-500 text-white rounded-md">Exportar a Excel</a>
        </div>
    </div>


    <div class="bg-white overflow-hidden shadow-sm my-5">
        
        
        @if ($habitaciones->isEmpty())
            <p class="p-4 text-center">No hay habitaciones con esos datos.</p>
        @else
            @foreach ($habitaciones as $habitacion)
                <div class="p-6 overflow-hidden shadow-md dark:bg-dark-eval-1 md:flex md:justify-between md:items-center">
                    <div class="leading-10">
                        <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="text-xl font-bold">
                            {{ $habitacion->id }}
                        </a>
                    </div>

                    <div class="leading-10">
                        <img src="{{ asset('storage/habitaciones/'. $habitacion->url_imagen) }}" alt="Imagen de la habitación" class="w-20 h-20">
                    </div>

                    <div class="leading-10">
                        Precio: {{ $habitacion->tipoHabitacion->precio }}
                    </div>

                    <div class="leading-10">
                        Numero de Habitación: {{ $habitacion->numero }}
                    </div>

                    <div class="leading-10">
                        Fecha de Registro: {{ $habitacion->created_at->format('Y-m-d') }}
                    </div>

                    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                        <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Detalles</a>
                        <a href="{{ route('habitaciones.edit', $habitacion->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                        <button wire:click="$emit('mostrarAlerta', {{ $habitacion->id }})" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="flex justify-center mt-10">
        {{ $habitaciones->links() }}
    </div>


</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        Livewire.on('mostrarAlerta', usuarioId =>{
            Swal.fire({
            title: '¿Eliminar Habitacion?',
            text: "Confirme eliminar la Habitacion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('eliminarHabitacion', usuarioId)
            Swal.fire(
                'Eliminado!',
                'Usuario Eliminado Correctamente',
                'success'
            )
        }
                })
        })


    </script>
@endpush