<form method="POST" action="{{ route('save') }}">
    @csrf
    <input type="text" name="name" placeholder="Ingresa tu nombre"><br>
    <input type="text" name="last_name" placeholder="Ingresa tu apellido"><br>
    <input type="email" name="email" placeholder="Ingresa tu email"><br>
    <input type="text" name="phone" placeholder="Ingresa tu telefono"><br>
    <input type="password" name="password"><br>
    <button type="submit">Guardar</button>
</form>
