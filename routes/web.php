<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/repartidor', function (){
    // $user = App\Motorcycle::find(3)->user;
    $motorcycle = App\Motorcycle::find(3);
    // $user = $motorcycle->user
    return $motorcycle->user->name;
});

/* To test: One to one */
Route::get('/moto', function (){
    $user = App\User::find(7);
    return $user->motorcycle->code;
});

Route::get('/repartidor/guardar', function (){
    $user = new App\User([
        'name' => 'Vicente',
        'email' => 'vicente2@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('secret123')
    ]);

    $motorcycle = App\Motorcycle::create([
        'brand' => 'Keeway',
        'model' => 'Superlight 200',
        'code'  => '4477GFFTH'
    ]);

    $motorcycle->user()->save($user);

    return 'Guardado.';
});

/* To test: One to many */
Route::get('/categoria/productos', function() {
    $products = App\Category::find(7)->products;
    foreach ($products as $product) {
        $names[] = $product->name;
    }
    dd($names);
});

Route::get('/categoria/producto', function() {
    $product = App\Category::find(7)->products()->where('name', 'nemo et')->first();
    return $product->name;
});

Route::get('/producto/categoria', function() {
    $product = App\Product::find(10);
    return $product->category->name;
});

Route::get('/producto/guardar', function (){
    /*$product = new App\Product(['name' => 'Thinkpad P52']);
    $category = App\Category::find(5);
    $category->products()->save($product);*/

    /*$product1 = new App\Product(['name' => 'Xiaomi Mi A2']);
    $product2 = new App\Product(['name' => 'Xiaomi Mi A3']);
    $category = App\Category::find(3);
    $category->products()->saveMany([$product1,$product2]);*/

    $category = App\Category::find(10);
    $product = $category->products()->create([
        'name' => 'iPhone 11',
    ]);

    return 'Producto guardado!';
});

Route::get('/producto/actualizar', function () {
    $category = App\Category::find(7);
    $product = App\Product::find(32);
    $product->category()->associate($category);
    $product->save();

    return 'Producto Actualizado';
});

/* To test: Many to Many */
Route::get('/usuario/productos', function (){
    $user = App\User::find(1);
    return view('products')->with('user', $user);
});

Route::get('/usuario/productos-otros', function (){
    $user = App\User::find(1);
    $products = $user->products()->where('category_id', 9)->get();
    foreach ($products as $product) {
        $category = $product->category;
    }
    return $category->name;
});

Route::get('/producto/users', function () {
    $product = App\Product::find(16);
    foreach ($product->users as $user) {
        dd($user->info->updated_at);
    }
});

Route::get('/save/usuarios-productos', function () {
    $user = App\User::find(7);

    //$product = App\Product::find(7);
    //$user->products()->save($product);

    //$product1 = App\Product::find(14);
    //$product2 = App\Product::find(22);
    //$user->products()->saveMany([$product1, $product2]);

    $user->products()->create([
        'category_id' => 6,
        'name' => 'Lenovo XY'
    ]);

    return 'OK.';
});

Route::get('/vincular', function(){
    $user = App\User::find(12);

    //$user->products()->attach(13);

    $user->products()->attach([12,10,18]);

    return 'Vinculado';
});

Route::get('/desvincular', function(){
    $user = App\User::find(12);

    //$user->products()->detach(12);

    $user->products()->detach([13, 10]);

    return 'Desvinculado';
});

Route::get('/sincronizar', function(){
    //$user = App\User::find(7);
    //$user->products()->sync([7,14,36]);

    //$product = App\Product::find(7);
    //$product->users()->sync([5]);

    $product = App\Product::find(16);
    $product->users()->syncWithoutDetaching([5]);

    $product->users()->toggle([5,4,12,9]);

    return 'Sincronizado.';
});

/* Has One Through */
Route::get('/datos-desde-moto', function () {
    $motorcycle = App\Motorcycle::find(30);
    $data = $motorcycle->userPersonalData;
    return $data->address;
});

/* Has Many Through */
Route::get('/datos-desde-category', function () {
    $category = App\Category::find(8);
    $models = $category->productModels;
    dd($models);
});

/* Querying Relations */

use Illuminate\Database\Eloquent\Builder;
Route::get('/producto/modelos', function (){
    $product = App\Product::find(28);

    $models = $product->productModels()->where('price', '>', 100)->orWhere('price', 300)->get();

    $modelsB = $product->productModels()->where(function (Builder $query){
        return $query->where('price', '>', 100)
                    ->orWhere('price', 300);
    })->get();

    return $modelsB[0]->description;
});

Route::get('/producto/verificar/modelos/', function(){
    //$products = App\Product::has('productModels')->get();

    $products = App\Product::whereHas('productModels', function (Builder $query) {
        $query->where('price', '<=', 250.30);
    })->get();

    return $products[0]->name;
});

Route::get('/productos/sin-modelos/', function(){
    //$products = App\Product::doesntHave('productModels')->get();

    $products = App\Product::whereDoesntHave('productModels', function (Builder $query) {
        $query->where('price', '<=', 250.30);
    })->get();

    return $products[0]->name;
});

Route::get('/productos/cantidad-modelos/', function(){
    //$products = App\Product::withCount('productModels')->get();

    $products = App\Product::withCount(['users', 'productModels'])->get();

    return view('conteo', ['products' => $products]);
});

Route::get('/carga-perezosa', function(){
    $products = App\Product::all();
    return view('lazy-load', ['products' => $products]);
});

Route::get('/carga-ansiosa', function(){
    $products = App\Product::with('category')->get();
    return view('eager-load', ['products' => $products]);
});

Route::get('/carga-ansiosa-anidada', function(){
    $categories = App\Category::with('products.users')->get();
    return 'Anidado..';
});

Route::get('/carga-ansiosa-columnas', function(){
    $products = App\Product::with('category:id,name')->get();
    return view('eager-load', ['products' => $products]);
});

Route::get('/carga-ansiosa-por-defecto', function(){
    $productModels = App\ProductModel::get();
    return $productModels[0]->product->name;
});
