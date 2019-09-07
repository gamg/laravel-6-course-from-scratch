@extends('layout.app')

@section('title', 'Este es el titulo de ejemplo')

@section('content')
    @inject('products', 'App\Services\ProductsService')

    <h1>Ejemplo injectando un servicio</h1>

    <ul>
        @foreach($products->getProducts() as $product)
            <li>{{ $product  }}</li>
        @endforeach
    </ul>
@endsection



