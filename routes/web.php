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

Route::get('/usuarios', 'UserController@allUsers');
Route::get('/usuario', 'UserController@user');
Route::get('/condicion', 'UserController@condition');
Route::get('/telefonos', 'UserController@phones');
Route::get('/otros', 'UserController@others');
Route::get('/seleccion', 'UserController@selection');
Route::get('/guardar', 'UserController@store');
Route::get('/actualizar', 'UserController@update');
Route::get('/eliminar', 'UserController@delete');
