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

// Labels
Route::get('/', 'LabelController@index')->name('index');
Route::get('build', 'LabelController@build')->name('build');
Route::post('print', 'LabelController@print')->name('print');
Route::post('customer', 'LabelController@customer')->name('customer');

// statistic
Route::get('stats', 'EventController@index')->name('stats');
Route::post('event', 'EventController@store')->name('stats.store');
