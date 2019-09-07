@extends('layout.app')

@section('title', 'Este es el titulo de ejemplo')

@section('content')
    Tu nombre: {{ $name }}<br>
    Tu apellido: {{ $lastname }}<br>
    Tu edad: {{ $age }}<br>
    <hr>
    @component('components.alert', ['var' => 'Mi variable'])
        @slot('title')
            Advertencia
        @endslot
        <p>Esto es un mensaje de alerta</p>
    @endcomponent
@endsection





