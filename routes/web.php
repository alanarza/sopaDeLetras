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

Route::get('/','SopaController@index');

Route::get('opcion1','SopaController@opcion1');
Route::get('opcion2','SopaController@opcion2');
Route::get('opcion3','SopaController@opcion3');
Route::get('opcion4','SopaController@opcion4');
