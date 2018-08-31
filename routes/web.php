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



Route::get('/','HomeController@index')->name('home');
Route::get('/import','HomeController@importView')->name('import.view');
Route::post('/','HomeController@search')->name('search');
Route::post('/upload','HomeController@import')->name('import');
Route::post('/save/import','HomeController@importSave')->name('import.save');