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

Route::get('/productos', function (){
    return 'Productos.....';
});

Route::post('/datos', function (){
    return 'Datos.....';
});

Route::get('/ejemplo', function (){
    $var = 15;
    return dump($var);
});

use App\User;
Route::get('/usuario', function (){
    $user = User::find(4);
    return $user->name;
});
