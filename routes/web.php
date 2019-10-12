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

Route::get('/guardar-sesion', 'UserController@save');
Route::get('/ver-sesion', 'UserController@show');
Route::get('/eliminar-sesion', 'UserController@delete');
Route::get('/datos-flash', 'UserController@flash');
Route::get('/crear-flash', 'UserController@createFlash');
Route::get('/mantener-flash', 'UserController@keepFlash');
