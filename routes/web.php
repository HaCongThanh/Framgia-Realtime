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
    return view('coming-soon');
});

Route::group(['prefix' => 'dev'], function() {
	Route::get('/', 'HomeController@index')->name('home');
});

Route::get('/realtime', 'SendMessageController@realTime')->name('realTime');

Route::get('/send', 'SendMessageController@index')->name('send');

Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
