@extends('layout.app')

@section('title', 'ejemplo con include')

@section('content')
    @include('partials.lista', ['title' => $title])
    @includeIf('partials.productos')
    @includeWhen($boolean, 'partials.lista')
    @includeFirst(['partials.productos', 'partials.lista'])
@endsection





