<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* RESOURCE UI */
Route::resource('message', 'MessageController');
Route::get('medico/profilo/{id}', 'ProfiloDottController@showProfile')->name('medico.showProfile');

Auth::routes();

/* MIDDLEWARE PER LA VISUALE DEI PANNELLI DEL DOTTORE */
Route::middleware('auth')->namespace('Medico')->prefix('medico')->name('medico.')->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('profilo', 'ProfiloController');
    Route::resource('prestazione', 'PrestazioneController');
    Route::resource('messaggi', 'MessaggioController');

});


