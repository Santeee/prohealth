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

Route::get('/', 'CambioTurnoController@index')->name('index')->middleware('auth');

Auth::routes();
Route::get('cambios', 'CambioTurnoController@get');
Route::post('cambios', 'CambioTurnoController@store');
Route::post('cambios/{cambio_turno_id}/aceptar', 'CambioTurnoController@accept');
Route::get('burnout', 'UserController@burnout')->name('burnout');

