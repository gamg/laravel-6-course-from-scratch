<form method="POST" action="{{ route('testform') }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="Ingresa tu nombre">
    <button type="submit">Guardar</button>
</form>
