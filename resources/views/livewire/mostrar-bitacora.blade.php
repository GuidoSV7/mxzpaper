<div>
    <div class="flex justify-between mt-4 mx-5">
        <div class="space-x">
            
        </div>
    
        <div class="my-2">  
            <a href="{{ route('exportar.bitacoras.pdf') }}" class="px-4 py-2 bg-red-500 text-white rounded-md">Descargar PDF</a>

            <a href="{{ route('exportar.bitacoras.xlsx') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">Descargar Excel</a>
                    </div>
    </div>
    
    
    <div style="background-color: white; width: 50%; margin: 0 auto; border-radius: 10px;">
    
    
    
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 8px;">Descripción</th>
                    <th style="border: 1px solid black; padding: 8px;">Encargado</th>
                    <th style="border: 1px solid black; padding: 8px;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bitacoras as $bitacora)
                <tr>
                    <td style="border: 1px solid black; padding: 8px;">{{ $bitacora->descripcion }}</td>
                    <td style="border: 1px solid black; padding: 8px;">{{ $bitacora->nombre_registro }}</td>
                    <td style="border: 1px solid black; padding: 8px;">{{ $bitacora->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</div>