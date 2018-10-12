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
    Route::get('/', 'User\HomeController@index')->name('user.home.index');

    Route::get('/find-rooms', 'User\HomeController@findRooms')->name('user.home.find_rooms');

    Route::get('/checkout', 'User\HomeController@checkOut')->name('user.home.check_out');

    Route::get('/login', 'Auth\LoginController@loginForm')->name('user.login_form');

    Route::post('/login', 'Auth\LoginController@login')->name('user.login');

    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');

    Route::get('/register', 'Auth\RegisterController@registerForm')->name('user.register_form');

    Route::post('/register', 'Auth\RegisterController@register')->name('user.register');

    Route::post('/session-bookings', 'User\HomeController@sessionBookings')->name('user.session_bookings');

    Route::post('/users/update-info', 'User\UserController@updateInfo')->name('user.users.update_info');

    Route::post('/users/update-payment', 'User\UserController@updatePayment')->name('user.users.update_payment');
});

/*---------------------- Admin Route --------------------*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    /* Categories */
    Route::get('/category','Admin\CategoriesController@index')->name('category');
    Route::get('/category/create','Admin\CategoriesController@create')->name('category_create');
    Route::post('/category/create','Admin\CategoriesController@store');
    Route::get('/category/{id?}edit','Admin\CategoriesController@edit')->name('category_edit');
    Route::post('/category/{id?}edit','Admin\CategoriesController@update');
    Route::post('/category/{id?}delete','Admin\CategoriesController@destroy')->name('category_delete');

    /* Posts */
    Route::get('/post','Admin\PostsController@index')->name('post');
    Route::get('/post/create','Admin\PostsController@create')->name('post_create');
    Route::post('/post/create','Admin\PostsController@store');
    Route::get('/post/{id?}edit','Admin\PostsController@edit')->name('post_edit');
    Route::post('/post/{id?}edit','Admin\PostsController@update');
    Route::post('/post/{id?}delete','Admin\PostsController@destroy')->name('post_delete');
});
/*-------------------------------------------------------*/

/*---------------------- Language -----------------------*/
Route::get('/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');
/*-------------------------------------------------------*/

Route::get('/realtime', 'SendMessageController@realTime')->name('realTime');

Route::get('/send', 'SendMessageController@index')->name('send');

Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
