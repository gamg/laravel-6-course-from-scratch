@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('client.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Ingresa tu nombre"><br>
    <input type="text" name="last_name" placeholder="Ingresa tu apellido"><br>
    <input type="text" name="email" placeholder="Ingresa tu email"><br>
    <input type="text" name="phone" placeholder="Ingresa tu telefono"><br>
    <input type="password" name="password"><br>
    <input type="password" name="password_confirmation"><br>
    <button type="submit">Guardar</button>
</form>
