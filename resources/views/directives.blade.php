@if($num == 7)
    <h2>Es igual el numero</h2>
@elseif($num < 7)
    <h2>El numero es menor que 7</h2>
@else
    <h2>El numero no es igual a 7</h2>
@endif

@isset($data)
    <h2>Variable seteada pero puede estar vacia</h2>
@endisset

@empty($data)
    <h2>Variable existente con valor diferente de vacio</h2>
@endempty
<hr>
@for($i=0; $i < count($fruits); $i++)
    {{ $i }} => {{ $fruits[$i] }}
@endfor
<br><br>
@foreach($array as $index => $item)
    {{ $index }}: {{ $item }}
@endforeach
<br><br>
@forelse ($fruits as $fruit)
    <li>{{ $fruit }}</li>
@empty
    <p>No hay frutas</p>
@endforelse
<hr>
<br>
@foreach($users as $user)
    @if($loop->first)
        Estoy en la iteracion #1
    @endif
    <br>
    {{ $user }}
    @if($loop->last)
        <br>
        Estoy en la ultima iteracion
    @endif
@endforeach
<br>
<br>
@foreach($clients as $index => $client)
    Nombre cliente: {{ $index }}<br>
    @foreach($client as $info)
        @if($loop->first)
            E-mail: {{ $info }}<br>
        @elseif($loop->last)
            Edad: {{ $info }}<br>
        @endif

        @if ($loop->parent->first)
            <br>
            <strong>Esta es la primera iteracion del primer forech</strong>
            <br>
        @endif
    @endforeach
@endforeach

{{-- Esto es un comentario --}}
