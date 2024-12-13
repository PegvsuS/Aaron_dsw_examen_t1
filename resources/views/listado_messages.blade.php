<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Dudas</title>
    <link href="/css/estilos.css" rel="stylesheet"/>
</head>
<body>
    <h1>Listado de Dudas</h1>

    <!-- Mostrar un mensaje de éxito si hay uno -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->mensaje }}</td>
                <td>
                                    
                        <!-- Formulario para eliminar la duda -->
                        <form action="{{ route('dudas.eliminar', $duda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Está seguro de que desea eliminar esta duda?');">Eliminar</button>
                        </form>
                        <a href="{{ route('dudas.editar', $duda->id) }}">Editar</a> <!-- Botón para editar -->
                    
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('formulario')=>return('messages') }}">Enviar una nueva duda</a>
</body>
</html>