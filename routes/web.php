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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('qr-code', function () 
{
  return QRCode::text('QR Code Generator for Laravel!')->png();    
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'guest'], function(){
    Route::get('/', 'CrudTamuController@index')->name('guest');
    Route::get('/create', 'CrudTamuController@create');
    Route::post('/create', 'CrudTamuController@store')->name('guest.store');
    Route::get('/{id}/preview', 'CrudTamuController@preview')->name('guest.preview');
    Route::get('/{id}/edit', 'CrudTamuController@edit')->name('guest.edit');
    Route::put('/{id}/update', 'CrudTamuController@update')->name('guest.update');
    Route::get('/{id}', 'CrudTamuController@destroy')->name('guest.destroy');
});

Route::get('/absensi', 'CrudTamuController@absensi')->name('absensi');
Route::post('/absensi/prosesabsen', 'CrudTamuController@prosesabsen')->name('absensi.prosesabsen');
