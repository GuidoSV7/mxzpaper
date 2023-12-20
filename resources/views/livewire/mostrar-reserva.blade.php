<div class="bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Detalles de la Reserva</h2>
    
    <div>
        <strong>ID:</strong>
        <span>{{ $reserva->id }}</span>
    </div>

    <div>
        <strong>Carnet del Cliente:</strong>
        <span>{{ $reserva->carnet }}</span>
    </div>

    <div>
        <strong>Nombre del Cliente:</strong>
        <span>{{ $reserva->nombre }}</span>
    </div>

    <div>
        <strong>Telefono del Cliente:</strong>
        <span>{{ $reserva->telefono }}</span>
    </div>
    
    <div>
        <strong>Correo del Cliente:</strong>
        <span>{{ $reserva->correo }}</span>
    </div>

    <div>
        <strong>Dirección del Cliente:</strong>
        <span>{{ $reserva->direccion }}</span>
    </div>

    <div>
        <strong>Fecha de Llegada:</strong>
        @if ($reserva->fecha_llegada)
            <span>{{ $reserva->fecha_llegada }}</span>
        @else
            <span>Aún no llegó el cliente</span>
        @endif
    </div>
    
    <div>
        <strong>Fecha de salida:</strong>
        @if ($reserva->fecha_salida)
            <span>{{ $reserva->fecha_salida }}</span>
        @else
            <span>El cliente aún sigue hospedado</span>
        @endif
    </div>
    

    
</div>
