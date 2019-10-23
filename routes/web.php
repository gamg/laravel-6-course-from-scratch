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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

use Illuminate\Support\Facades\Mail;
Route::get('/boletin', function () {
    Mail::to('tavo@cafedelprogramador.com')
            ->send(new \App\Mail\WelcomeNewsletter);

    return 'Correo enviado.';
});

use App\User;
Route::get('/notificacion', function (){
    $user = User::find(1);
    $user->notify(new \App\Notifications\RegisteredUser);
    return 'Notificacion enviada';
});
