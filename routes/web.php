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

    Route::get('/profiles/get-profile', 'User\ProfileController@getProfile')->name('user.profiles.get_profile');

    Route::get('/profiles/get-customer-booking-log', 'User\ProfileController@getCustomerBookingLog')->name('user.profiles.get_customer_booking_log');

    Route::post('/profiles/get-customer-booking-detail', 'User\ProfileController@getCustomerBookingDetail')->name('user.profiles.get_customer_booking_detail');

    Route::post('/profiles/cancel-reservation', 'User\ProfileController@cancelReservation')->name('user.profiles.cancel_reservation');

    Route::get('/rooms', 'User\RoomController@index')->name('user.rooms.index');

    Route::get('/posts', 'User\PostController@index')->name('user.posts.index');

    Route::post('/comments', 'CommentController@postComment')->name('user.post.comment');
    
    Route::post('/commentsDelete/{id}', 'CommentController@deleteComment')->name('user.post.delete');

    Route::get('/rooms/{id}', 'User\RoomController@show')->name('user.rooms.show');

    Route::get('/posts/{id}', 'User\PostController@show')->name('user.posts.show');

    Route::resource('profiles', 'User\ProfileController');
});

/*---------------------- Admin Route --------------------*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    Route::get('/dashboard-statistical','Admin\HomeController@dashboardStatistical')->name('admin.dashboard_statistical');

    Route::get('/note-notification','Admin\HomeController@noteNotification')->name('admin.note_notification');

    Route::get('/facilities/get-facilities','Admin\FacilityController@getFacilities')->name('admin.facilities.get_facilities');

    Route::resource('facilities','Admin\FacilityController');

    Route::get('/room-types/get-room-types','Admin\RoomTypeController@getRoomTypes')->name('admin.room_types.get_room_types');

    Route::resource('room-types','Admin\RoomTypeController');

    Route::get('/customer','Admin\CustomersController@index')->name('customer');

    Route::get('/customer-booking-logs/get-customer-booking-logs', 'Admin\CustomerBookingLogController@getCustomerBookingLogs')->name('admin.customer_booking_logs.get_customer_booking_logs');

    Route::post('/customer-booking-logs/get-customer-booking-detail', 'Admin\CustomerBookingLogController@getCustomerBookingDetail')->name('admin.customer_booking_logs.get_customer_booking_detail');

    Route::post('/customer-booking-logs/update-status', 'Admin\CustomerBookingLogController@updateStatus')->name('admin.customer_booking_logs.updateStatus');

    Route::post('/customer-booking-logs/get-info-customer-care', 'Admin\CustomerBookingLogController@getInfoCustomerCare')->name('admin.customer_booking_logs.get_info_customer_care');

    Route::post('/customer-booking-logs/customer-care-history', 'Admin\CustomerBookingLogController@customerCareHistory')->name('admin.customer_booking_logs.customer_care_history');

    Route::post('/customer-booking-logs/save-customer-call', 'Admin\CustomerBookingLogController@saveCustomerCall')->name('admin.customer_booking_logs.save_customer_call');

    Route::post('/customer-booking-logs/save-customer-messages', 'Admin\CustomerBookingLogController@saveCustomerMessages')->name('admin.customer_booking_logs.save_customer_messages');

    Route::post('/customer-booking-logs/customer-care-email-template', 'Admin\CustomerBookingLogController@customerCareEmailTemplate')->name('admin.customer_booking_logs.customer_care_email_template');

    Route::post('/customer-booking-logs/create-email-template', 'Admin\CustomerBookingLogController@createEmailTemplate')->name('admin.customer_booking_logs.create_email_template');

    Route::post('/customer-booking-logs/edit-email-template', 'Admin\CustomerBookingLogController@editEmailTemplate')->name('admin.customer_booking_logs.edit_email_template');

    Route::post('/customer-booking-logs/update-email-template', 'Admin\CustomerBookingLogController@updateEmailTemplate')->name('admin.customer_booking_logs.update_email_template');

    Route::post('/customer-booking-logs/delete-email-template', 'Admin\CustomerBookingLogController@deleteEmailTemplate')->name('admin.customer_booking_logs.delete_email_template');

    Route::post('/customer-booking-logs/convert-email-content', 'Admin\CustomerBookingLogController@convertEmailContent')->name('admin.customer_booking_logs.convert_email_content');

    Route::post('/customer-booking-logs/send-email-customer-care', 'Admin\CustomerBookingLogController@sendEmailCustomerCare')->name('admin.customer_booking_logs.send_email_customer_care');

    Route::get('/customer-booking-logs/get-content-customer-care', 'Admin\CustomerBookingLogController@getContentCustomerCare')->name('admin.customer_booking_logs.get_content_customer_care');

    Route::get('/categories/get-categories','Admin\CategoryController@getCategories')->name('admin.categories.get_categories');

    Route::resource('categories', 'Admin\CategoryController');

    Route::get('/posts/get-posts','Admin\PostController@getPosts')->name('admin.posts.get_posts');

    Route::resource('posts','Admin\PostController');

    Route::get('/roles/get_list_roles','Admin\RoleController@getListRoles')->name('admin.roles.get_list_roles');

    Route::post('/roles/update_permission_role','Admin\RoleController@updatePermissionRole')->name('admin.roles.update_permission_role');

    Route::post('/users/update_role_user','Admin\UserController@updateRoleUser')->name('admin.users.update_role_user');

    Route::get('/roles/get_list_permission_role/{role_id}','Admin\RoleController@getListPermissionRole')->name('admin.roles.get_list_permission_role');

    Route::get('/users/get_list_role_user/{user_id}','Admin\UserController@getListRoleUser')->name('admin.users.get_list_role_user');

    Route::resource('room','Admin\RoomsController');

    Route::resource('customer-booking-logs','Admin\CustomerBookingLogController');

    Route::resource('users','Admin\UserController');

    Route::resource('profile', 'Admin\ProfileController');

    Route::post('/profile/{id}', 'Admin\ProfileController@uploadImage')->name('user.upload_images');

    Route::match(['get', 'post'], '/password', 'Admin\ProfileController@updatePassword');

    Route::resource('customers','Admin\CustomerController');

    Route::resource('roles', 'Admin\RoleController');

    Route::resource('permissions', 'Admin\PermissionController');
});
/*-------------------------------------------------------*/

Route::get('/realtime', 'SendMessageController@realTime')->name('realTime');

Route::get('/send', 'SendMessageController@index')->name('send');

Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---------------------- Language -----------------------*/
Route::get('/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');
/*-------------------------------------------------------*/


