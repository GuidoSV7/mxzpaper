<div class="bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Detalles de la Habitación</h2>
    
    <div>
        <img src="{{ asset('storage/habitaciones/'. $habitacion->url_imagen) }}" alt="" style="width: 50%; height: 300px;margin-bottom: 10px;">
    </div>

    <div>
        <strong>ID:</strong>
        <span>{{ $habitacion->id }}</span>
    </div>

    <div>
        <strong>Numero:</strong>
        <span>{{ $habitacion->numero }}</span>
    </div>

    <div>
        <strong>Piso:</strong>
        <span>{{ $habitacion->piso }}</span>
    </div>

    <div>
        <strong>Tipo de Habitación:</strong>
        <span>{{ $habitacion->tipoHabitacion->descripcion }}</span>
    </div>
    
    <div>
        <strong>Estado de Habitación:</strong>
        <span>{{ $habitacion->estadoHabitacion->descripcion }}</span>
    </div>

    <div>
        <strong>Servicios:</strong>
        @if ($habitacion->servicios->isEmpty())
            <span>Esta habitación no tiene servicios.</span>
        @else
            <ul style="margin-top: 5px;">
                @foreach ($habitacion->servicios as $servicio)
                    <li style="list-style-type: disc; margin-left: 15px;">{{ $servicio->descripcion }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
