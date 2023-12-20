<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Usuarios</title>
    <style>
        body {
            background-color: #f1f1f1;
            color: #000000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ffffff;
        }
        th {
            background-color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #555555;
        }
    </style>
</head>
<body>
    <h1 class="color: black">Reporte de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</body>
</html>
