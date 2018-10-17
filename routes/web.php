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

    /* Category */
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

    /* Facilities */
    Route::get('/facility','Admin\FacilitiesController@index')->name('facility');
    Route::get('/facility/create','Admin\FacilitiesController@create')->name('facility_create');
    Route::post('/facility/create','Admin\FacilitiesController@store');
    Route::get('/facility/{id?}edit','Admin\FacilitiesController@edit')->name('facility_edit');
    Route::post('/facility/{id?}edit','Admin\FacilitiesController@update');
    Route::post('/facility/{id?}delete','Admin\FacilitiesController@destroy')->name('facility_delete');

    /* Room Type */
    Route::get('/room_type','Admin\RoomTypesController@index')->name('room_type');
    Route::get('/room_type/create','Admin\RoomTypesController@create')->name('room_type_create');
    Route::post('/room_type/create','Admin\RoomTypesController@store');
    Route::get('/room_type/{id?}edit','Admin\RoomTypesController@edit')->name('room_type_edit');
    Route::post('/room_type/{id?}edit','Admin\RoomTypesController@update');
    Route::post('/room_type/{id?}delete','Admin\RoomTypesController@destroy')->name('room_type_delete');

    /* Room */
    Route::get('/room','Admin\RoomsController@index')->name('room');
    Route::get('/room/create','Admin\RoomsController@create')->name('room_create');
    Route::post('/room/create','Admin\RoomsController@store');
    Route::get('/room/{id?}edit','Admin\RoomsController@edit')->name('room_edit');
    Route::post('/room/{id?}edit','Admin\RoomsController@update');
    Route::post('/room/{id?}delete','Admin\RoomsController@destroy')->name('room_delete');

    /* Booking List */
    Route::get('/booking','Admin\RoomListBookController@index')->name('rooms');
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
