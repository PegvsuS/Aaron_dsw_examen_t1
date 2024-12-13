<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Mensajes</h1>


        {{-- <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data">
            @csrf
        
            <!-- ... otros campos del formulario ... -->
        
            <input type="file" name="image">
        
            <label for="image_url">URL de la imagen:</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}">
        
            <!-- ... resto del formulario ... -->
        </form> --}}

            <form action="/messages/update" method="POST" enctype="multipart/form-data">
                @csrf
                <table border="1" style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Texto</th>
                            <th>Imagen</th>
                            <th>URL</th>
                            <th>Eliminar</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->text }}</td>
                                <td>
                                    @if ($message->image_url)
                                        <img src="{{ $message->image_url }}" alt="Imagen del mensaje" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        Sin imagen
                                    @endif
                                </td>
                                <td>
                                <img src="{{ $message->image_url }}">
                                </td>

                                <td>
                                    <form action="{{ route('message.eliminar', $message->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Está seguro de que desea eliminar este mensaje?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <a href="/formulario">Añadir Mensaje</a>
    </div>
</body>
</html>