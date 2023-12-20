<div>
    <div class="py-5 mx-5">
        <input type="text" wire:model="searchTerm" placeholder="Buscar por nombre o numero de reserva" class="w-full p-2 border border-gray-300 rounded-md">
    </div>



    <div class="bg-white overflow-hidden shadow-sm my-5">
        
        
        @if ($reservas->isEmpty())
            <p class="p-4 text-center">No hay reservas con esos datos.</p>
        @else
            @foreach ($reservas as $reserva)
                <div class="p-6 overflow-hidden shadow-md dark:bg-dark-eval-1 md:flex md:justify-between md:items-center">
                    <div class="leading-10">
                        <a href="{{ route('reservas.show', $reserva->id) }}" class="text-xl font-bold">
                            {{ $reserva->id }}
                        </a>

                    </div>
                    <div class="leading-10">
                        Carnet del Cliente: {{ $reserva->carnet }}
                    </div>

                    <div class="leading-10">
                        Nombre del Cliente: {{ $reserva->nombre }}
                    </div>


                    <div class="leading-10">
                        Estado: {{ $reserva->estado }}
                    </div>



                    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                        <a href="{{ route('reservas.show', $reserva->id) }}" class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Detalles</a>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                        <button wire:click="$emit('mostrarAlerta', {{ $reserva->id }})" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{-- <div class="flex justify-center mt-10">
        {{ $reservas->links() }}
    </div> --}}


</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        Livewire.on('mostrarAlerta', usuarioId =>{
            Swal.fire({
            title: '¿Eliminar reserva?',
            text: "Confirme eliminar la reserva",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('eliminarReserva', usuarioId)
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