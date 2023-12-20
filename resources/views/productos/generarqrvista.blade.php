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

        <form method="POST" action="/generarqr">
            @csrf

            <div class="mt-4">
                <label for="tcnRzonSocial" class="block font-medium text-sm text-gray-700">Razon Social:</label>
                <input type="text" name="tcnRzonSocial" id="tcnRzonSocial" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="tcCiNit" class="block font-medium text-sm text-gray-700">CI/NIT:</label>
                <input type="text" name="tcCiNit" id="tcCiNit" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="tnTelefono" class="block font-medium text-sm text-gray-700">Teléfono:</label>
                <input type="text" name="tnTelefono" id="tnTelefono" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mt-4">
                <label for="tcCorreo" class="block font-medium text-sm text-gray-700">Correo:</label>
                <input type="text" name="tcCorreo" id="tcCorreo" class="form-input mt-1 block w-full" required>
            </div>

           <div class="row mb-3">
            <div class="col-md-6">
                <label for="tnMonto" class="block font-medium text-sm text-gray-700"> Monto Total</label>
                <input type="text" name="tnMonto" id="tnMonto" class="form-input mt-1 block w-full" required>
            </div>
            <div class="col-md-6">
                <label for="tnTipoServicio" class="block font-medium text-sm text-gray-700"> Tipo de Servicio</label>
                <select name="tnTipoServicio" id="tnTipoServicio" class="form-input mt-1 block w-full" required>
                    <option value="1">Servicio QR</option>
                    <option value="2">Tigo Money</option>
                </selecet>
            </div>

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
