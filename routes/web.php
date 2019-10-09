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
