<!DOCTYPE html>
<html>
<head>
    <title>Detalles de producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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

        <form method="POST" action="/guardar-datos">
            @csrf

            <div class="mt-4">
                <label for="carnet" class="block font-medium text-sm text-gray-700">Carnet:</label>
                <input type="text" name="carnet" id="carnet" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="correo" class="block font-medium text-sm text-gray-700">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="direccion" class="block font-medium text-sm text-gray-700">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="form-input mt-1 block w-full" required>
            </div>

            <input type="hidden" name="producto_id" value="{{ $producto->id }}">

            <div class="mt-6">
                <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">Guardar</button>
                <a href="/" class="bg-orange-500 text-white py-2 px-4 rounded-md ml-2">Volver al inicio</a>
            </div>
        </form>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Otros scripts JavaScript -->
</body>
</html>
