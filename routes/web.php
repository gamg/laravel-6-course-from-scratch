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

Route::get('/inicio', 'UserController@index')->middleware('checkage:87');
Route::get('/nombre/{name}', 'UserController@showName')->middleware('migrupo');
Route::get('/suma/{num?}', 'UserController@suma')->middleware('checkage:95');

Route::namespace('Admin')->middleware('checkage:95')->group(function (){
    Route::get('/admin', 'AdministratorController@index');
    Route::get('/dashboard', 'dashboardController@index');
    Route::get('/invoice', 'InvoiceController@index');
});

Route::resource('/cliente', 'CustomerController');
