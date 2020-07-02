<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return redirect('acasa');
});
Route::get('/acasa','HomeController@index')->name('acasa');
Route::get('animale', 'AnimalController@index')->name('animale');
Route::get('/animale/create', 'AnimalController@create')->name('animale.create')->middleware('auth');
Route::post('/animale', 'AnimalController@store')->name('animale.store')->middleware('auth');
Route::get('/animale/{id}/show', 'AnimalController@show')->name('animale.show')->middleware('auth');
Route::get('/animale/{id}/edit', 'AnimalController@edit')->name('animale.edit')->middleware('auth');
Route::put('/animale/{id}', 'AnimalController@update')->name('animale.update')->middleware('auth');
Route::delete('/animale/{id}', 'AnimalController@destroy')->name('animale.destroy')->middleware('auth');
Route::get('/utilizatori', 'UserController@index')->name('utilizatori')->middleware('auth');
Route::get('/utilizatori/{id}/edit', 'UserController@edit')->name('utilizatori.edit')->middleware('auth');
Route::put('/utilizatori/{id}', 'UserController@update')->name('utilizatori.update')->middleware('auth');
Route::delete('/utilizatori/{id}', 'UserController@destroy')->name('utilizatori.delete')->middleware('auth');
Route::get('/cereri/toate', 'CereriController@index')->name('cereri')->middleware('auth');
Route::get('/cererile-mele', 'CereriController@cereriuser')->name('cererile-mele')->middleware('auth');
Route::get('/cereri/{id}/create', 'CereriController@create')->name('cereri.create')->middleware('auth');
Route::post('/cereri', 'CereriController@store')->name('cereri.store')->middleware('auth');
Route::get('/cereri/{id}/show', 'CereriController@show')->name('cereri.show')->middleware('auth');
Route::get('/cereri/{id}/edit', 'CereriController@edit')->name('cereri.edit')->middleware('auth');
Route::put('/cereri/{id}', 'CereriController@update')->name('cereri.update')->middleware('auth');
Route::delete('/cereri/{id}', 'CereriController@destroy')->name('cereri.destroy')->middleware('auth');
Route::put('/cereri/{id}/aproba','CereriController@aproba')->name('cereri.aproba')->middleware('auth');
Route::get('/rapoarte', 'CereriController@rapoarte')->name('cereri.rapoarte')->middleware('auth');
Route::get('/despre', 'HomeController@despre')->name('despre');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::get('/contact/{id}/show','ContactController@show')->name('contact.show');
Route::post('/contact', 'ContactController@store')->name('contact.store');
Route::delete('/contact/{id}', 'ContactController@destroy')->name('contact.destroy');
Route::get('/downloadPDF/{id}', 'CereriController@downloadPDF');

