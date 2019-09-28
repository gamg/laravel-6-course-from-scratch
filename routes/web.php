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

/* Con query builder */
Route::get('/usuarios', 'UserController@allUsers');
Route::get('/usuario', 'UserController@user');
Route::get('/condicion', 'UserController@condition');
Route::get('/telefonos', 'UserController@phones');
Route::get('/otros', 'UserController@others');
Route::get('/seleccion', 'UserController@selection');
Route::get('/guardar', 'UserController@store');
Route::get('/actualizar', 'UserController@update');
Route::get('/eliminar', 'UserController@delete');

/* Con Eloquent */
Route::get('/clientes', 'ClientController@clients');
Route::get('/cliente', 'ClientController@client');
Route::get('/cliente/almacenar', 'ClientController@store');
Route::get('/cliente/masivo', 'ClientController@massAssignment');
Route::get('/cliente/fill', 'ClientController@massAssignmentFill');
Route::get('/cliente/actualizar', 'ClientController@actualizar');
Route::get('/cliente/editar', 'ClientController@update');
Route::get('/cliente/eliminar', 'ClientController@delete');

/* guardar en BD desde un formulario */
Route::get('/form', function() {
    return view('form');
});

Route::put('/form', 'ClientController@testingForm')->name('testform');

Route::view('/guardar-datos', 'save_data');
Route::post('/guardar-datos', 'ClientController@saveFromForm')->name('save');

Route::view('/almacenar', 'store');
Route::post('/almacenar', 'ClientController@clientStore')->name('client.store');
