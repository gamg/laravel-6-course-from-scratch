@foreach($products as $product)
    Producto: {{ $product->id }}
    Users: {{ $product->users_count }}
    Models: {{ $product->product_models_count }}
    <br>
@endforeach
