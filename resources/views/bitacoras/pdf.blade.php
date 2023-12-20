<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Bitacora</title>
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
        <h1>Reporte de Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Encargador</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bitacoras as $bitacora)
                <tr>
                    <td>{{ $bitacora->id }}</td>
                    <td>{{ $bitacora->descripcion }}</td>
                    <td>{{ $bitacora->nombre_registro }}</td>
                    <td>{{ $bitacora->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>