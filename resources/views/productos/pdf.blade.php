<!DOCTYPE html>
<html>
<head>
    <title>Reporte de productos</title>
    <style>
        /* Estilos CSS para el archivo PDF */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
            text-align: center; /* Centrar el título */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center; /* Centrar el contenido de las celdas */
        }
        .container {
            max-width: 600px;
            margin: 0 auto; /* Centrar el contenedor */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reporte de productos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->description }}</td>
                    <td>{{ $producto->price }}</td>
                    <td>{{ $producto->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
