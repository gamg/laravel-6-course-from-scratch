@extends('layout.app')

@section('title', 'Este es mi titulo')

@section('sidebar')
    @parent

    <p>Este es el mensaje desde la vista hija</p>
@endsection

@section('content')
    <p>este es el contenido de la vista hija</p>
    <hr>
    @component('components.alert', ['var' => 77])
        @slot('title')
            Advertencia desde otra vista
        @endslot
        <p>Esto es un mensaje de alerta desde otra vista</p>
    @endcomponent
@endsection
