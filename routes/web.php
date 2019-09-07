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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'welcome', ['name' => 'Gustavo']);

Route::get('/hola', function (){
    return 'Hola!';
})->name('saludo');

Route::get('suma', function (){
    $a = 7;
    $b = 3;
    return $a + $b;
})->name('plus');

Route::get('/nombre/{name}', function ($name){
    return 'El nombre es '.$name;
})->name('tu.nombre');

Route::get('/operacion/{a?}', function ($a = 4){
    $b = 3;
    return $a + $b;
});

/*Route::get('/user/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');*/

Route::get('/user/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' Name: '.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

/*Route::redirect('/publicaciones', '/articulos', 301);*/

Route::permanentRedirect('/publicaciones', '/articulos');

Route::get('/articulos', function (){
    return 'Estoy en articulos';
});

Route::get('/redireccion', function () {
    return redirect()->route('saludo');
});

Route::get('/verificar', function () {
    if (Request::route()->named('verify')) {
        return "OK";
    } else {
        return 'No es la ruta';
    }
})->name('verify');

Route::namespace('Admin')->group(function () {
    Route::get('/micontroller', 'AdminController@index');
});

Route::prefix('/seccion')->group(function () {
    Route::get('/primera', function () {
        return 'Primera...';
    });
    Route::get('/segunda', function () {
        return 'Segunda...';
    });
    Route::get('/tercera', function () {
        return 'Tercera...';
    });
});

Route::name('calzado.')->prefix('/zapatos')->group(function () {
    Route::get('/deportivos', function () {
        return 'Deportivos';
    })->name('zapato');

    Route::get('/casuales', function () {
        return 'Casual';
    })->name('casual');

    Route::get('/sandalias', function () {
        return 'sandalias';
    })->name('sanda');
});
