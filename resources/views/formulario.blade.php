<form id="form" action="{{ route('messages.enviar') }}" method="POST">
    @csrf
    <div>
    <label for="message">Mensaje:</label>
    <textarea name="message" id="message" placeholder="Escribe un mensaje...">{{ old('message') }}</textarea><br><br>
    </div>   

<div>
    <input type="file" name="image">

    <label for="image_url">URL de la imagen:</label>
    <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}">
    <br><br>

    
</div>

<button type="submit">Enviar Mensaje</button>

</form>

<a href="/messages">Volver a la Lista</a>

@if($errors->any())
    <p>error</p>
@endif
