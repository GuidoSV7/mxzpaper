<!DOCTYPE html>
<html>
<head>
    <title>QR Generado</title>
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


    <h1>QR Generado</h1>

    @if(isset($laQrImage))
        <img src="{{ $laQrImage }}" alt="Imagen QR">
    @else
        <p>No se pudo cargar la imagen QR.</p>
    @endif



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Otros scripts JavaScript -->
</body>
</html>
