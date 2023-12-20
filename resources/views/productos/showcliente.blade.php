<!DOCTYPE html>
<html>
<head>
    <title>Detalles de producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('styles')
    <!-- Otros estilos CSS -->
</head>
<body>
    <!-- Contenido de tu página -->

    <div class="bg-orange-100 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Detalles del Producto</h2>

        <div>
            <img src="{{ asset('storage/productos/'. $producto->photourl) }}" alt="" style="width: 50%; height: 300px;margin-bottom: 10px;">
        </div>


        <div>
            <strong>Nombre:</strong>
            <span>{{ $producto->name}}</span>
        </div>

        <div>
            <strong>Descripcion:</strong>
            <span>{{ $producto->description }}</span>
        </div>

        <div>
            <strong>Precio:</strong>
            <span>{{ $producto->price }}</span>
        </div>




        <div class="mt-6">
            @auth
            <a href="{{ route('productos.reserva', ['producto' => $producto->id]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-md">Comprar Producto</a>
            <a href="{{ route('productos.generarqrvista', ['producto' => $producto->id]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-md">Quiero Comprar por Qr</a>

            <a href="https://acortar.link/ZIy90A" target="_blank" class="bg-green-500 text-white py-2 px-4 rounded-md ml-2">
              <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
            @endauth

            <a href="/" class="bg-orange-500 text-white py-2 px-4 rounded-md ml-2">Volver al inicio</a>
          </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Otros scripts JavaScript -->
</body>
</html>
