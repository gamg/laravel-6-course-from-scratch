@foreach($products as $product)
    Producto: {{ $product->name }}
    Categoria: {{ $product->category->name }}
    <br>
@endforeach
