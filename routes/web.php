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
Route::view('/doc', 'apidoc.index');
Route::get('/', 'EventController@index')->name('index');

Auth::routes();

Route::get('clients', 'HomeController@index')->name('clients');
Route::get('finished', 'EventController@finished_events')->name('finished');
Route::get('create', 'EventController@create')->name('event.create');
Route::get('edit/{event}', 'EventController@edit')->name('event.edit');
Route::get('score/{event}', 'EventController@score')->name('event.score');
Route::post('score/{event}', 'EventController@update_score')->name('event.score');
Route::post('finish/{event}', 'EventController@finish')->name('event.finish');
Route::post('store', 'EventController@store')->name('event.store');
Route::post('update/{event}', 'EventController@update')->name('event.update');
Route::post('delete/{event}', 'EventController@destroy')->name('event.delete');
