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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/', 'welcome', ['name' => 'Gustavo']);

Route::view('/ejemplo-blade', 'child');

Route::get('/mis-datos', 'UserController@index');

Route::view('/desplegar', 'display', ['data' => '<p>Este es un parrafo</p>']);

Route::get('/directivas', 'UserController@numbers');

Route::view('/incluir', 'incluir', ['title' => 'Ejemplo de la directiva include', 'boolean' => false]);

Route::view('/inyectar', 'inject');

Route::view('/usuarios', 'profile');
Route::view('/panel', 'dashboard');

Route::view('ejemplos', 'examples');
