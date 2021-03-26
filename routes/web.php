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

Route::get('/','HomeController@index')->name('home');
Route::post('/search','HomeController@search')->name('home.search');
Route::get('/braintree', function () {
    return view('braintree');
})->name('braintree');
/* test section */
/* Cookie Route */

Route::post('recensioni/store/{id}', 'RecensioniController@store')->name('medico.recensione.store');
Route::get('recensioni', 'RecensioniController@index');//andra modificata /eliminata
/* test */

/* test section */
/* Cookie Route */

Route::post('recensioni/store/{id}', 'RecensioniController@store')->name('medico.recensione.store');
Route::get('recensioni', 'RecensioniController@index');//andra modificata /eliminata
/* test */

/* RESOURCE UI */
Route::resource('message', 'MessageController');
Route::get('medico/profilo/{id}', 'ProfiloDottController@showProfile')->name('medico.showProfile');

Auth::routes();

/* MIDDLEWARE PER LA VISUALE DEI PANNELLI DEL DOTTORE */
Route::middleware('auth')->namespace('Medico')->prefix('medico')->name('medico.')->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('profilo', 'ProfiloController')->except(['create','show','edit']);
    Route::resource('prestazione', 'PrestazioneController')->except('show');
    Route::resource('messaggi', 'MessaggioController')->only(['index','show','destroy']);
    Route::resource('recensioni', 'RecensioneController')->only(['index','show']);
    Route::get('/get-chart', 'ChartJSController@getChartsData');
    Route::get('statistiche', 'StatisticheController@index')->name('statistiche');

});
