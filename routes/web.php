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

    Route::get('/bookings', 'User\HomeController@bookings')->name('user.bookings');

    Route::get('/bookings/bill', 'User\HomeController@bill')->name('user.bookings.bill');

    Route::post('/bookings/bill-detail', 'User\HomeController@billDetail')->name('user.bookings.bill_detail');

    Route::get('/rooms', 'User\RoomController@index')->name('user.rooms.index');

    Route::get('/posts', 'User\PostController@index')->name('user.posts.index');

    Route::get('/rooms/{id}', 'User\RoomController@show')->name('user.rooms.show');
    
    Route::get('/posts/{id}', 'User\PostController@show')->name('user.posts.show');
});

/*---------------------- Admin Route --------------------*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    Route::resource('category', 'Admin\CategoriesController');

    Route::resource('post','Admin\PostsController');

    Route::resource('facility','Admin\FacilitiesController');

    Route::resource('room_type','Admin\RoomTypesController');

    Route::resource('room','Admin\RoomsController');

    Route::resource('booking','Admin\RoomListBookController');

    Route::get('/customer','Admin\CustomersController@index')->name('customer');

    Route::get('/user','Admin\UsersController@index')->name('user');

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
