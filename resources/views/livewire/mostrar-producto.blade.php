<div class="bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Detalles del Producto</h2>

    <div>
        <img src="{{ asset('storage/productos/'. $producto->photourl) }}" alt="" style="width: 50%; height: 300px;margin-bottom: 10px;">
    </div>

    <div>
        <strong>ID:</strong>
        <span>{{ $producto->id }}</span>
    </div>

    <div>
        <strong>Nombre:</strong>
        <span>{{ $producto->name }}</span>
    </div>

    <div>
        <strong>Descripcion:</strong>
        <span>{{ $producto->description }}</span>
    </div>

    <div>
        <strong>Precio:</strong>
        <span>{{ $producto->price }}</span>
    </div>




</div>
