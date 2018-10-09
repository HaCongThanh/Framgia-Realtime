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
	Route::get('/', 'HomeController@index')->name('home.index');

	Route::get('/find-rooms', 'HomeController@findRooms')->name('home.find_rooms');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    //Quản lý room_types
    Route::get('/room_types','Admin\RoomTypesController@index');
    Route::get('/room_types/create','Admin\RoomTypesController@create');
    Route::get('/room_types/edit','Admin\RoomTypesController@edit');
    Route::post('/room_types/edit','Admin\RoomTypesController@update');

    //Quản lý rooms
    Route::get('/rooms','Admin\RoomsController@index');
    Route::get('/rooms/create','Admin\RoomsController@create');
    Route::get('/rooms/edit','Admin\RoomsController@edit');
    Route::post('/rooms/edit','Admin\RoomsController@edit');

    //Quản lý rooms list book
    Route::get('/book_lists','Admin\RoomListBookController@index');

    //Quản lý post
    Route::get('/category','Admin\CategoriesController@index');
    Route::get('/category/create','Admin\CategoriesController@create');
    Route::get('/category/edit','Admin\CategoriesController@edit');
    Route::post('/category/edit','Admin\CategoriesController@update');

    Route::get('/post','Admin\PostsController@index');
    Route::get('/post/create','Admin\PostsController@create');
    Route::get('/post/edit','Admin\PostsController@edit');
    Route::post('/post/edit','Admin\PostsController@update');

    //Quan ly nhan vien
    Route::get('/user','Admin\UsersController@index');

    //Quan ly customer
    Route::get('/customer','Admin\CustomersController@index');
});

Route::get('/realtime', 'SendMessageController@realTime')->name('realTime');

Route::get('/send', 'SendMessageController@index')->name('send');

Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


