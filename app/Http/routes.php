<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// Authentication Routes...
//Route::get('auth/register', 'Auth\AuthController@register');
//Route::post('auth/register_user', 'Auth\AuthController@registerUser');
//Route::get('auth/password', 'Auth\AuthController@changePassword');
//Route::post('auth/change_password', 'Auth\AuthController@updatePassword');

Route::auth();
// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

Route::get('reservation/categories', 'ReservationController@categories');
Route::get('reservation/reservations', 'ReservationController@reservations');
Route::delete('reservation/reservations/{id}', 'ReservationController@destroy');
Route::put('reservation/reservations/{id}', 'ReservationController@update');
Route::get('reservation/index', 'ReservationController@index');
Route::get('reservation/resources/category_id/{category_id}',
  'ReservationController@resources');
Route::get('reservation/category/{id}', 'ReservationController@category');
Route::get('reservation/resources/calendar/{resource_id}', 'ReservationController@calendar');
Route::get('reservation/resources/reservations/{reservation_id}', 'ReservationController@reservation');
Route::get('reservation/resources/resource/{resource_id}', 'ReservationController@resource');
//Route::get('reservation/reservation_search/', 'ReservationController@reservationSearch');
Route::get('reservation/reservation_search', ['as' => 'reservationSearch', 'uses' => 'ReservationController@reservationSearch']);
Route::resource('reservation', 'ReservationController');


//// Authentication Routes...
//$this->get('login', 'Auth\AuthController@showLoginForm');
//$this->post('login', 'Auth\AuthController@login');
//$this->get('logout', 'Auth\AuthController@logout');
//
//// Registration Routes...

Route::get('auth/register', 'Auth\AuthController@showRegistrationForm');
Route::post('auth/register_user', 'Auth\AuthController@registerUser');

//$this->get('register', 'Auth\AuthController@showRegistrationForm');
//$this->post('register', 'Auth\AuthController@register');
//
//// Password Reset Routes...
//$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//$this->post('password/reset', 'Auth\PasswordController@reset');
//

// Admin only routes
Route::group(['middleware' => ['role:admin']], function () {

    // Category
    Route::post('category/upload', 'CategoryController@upload');
    Route::resource('category', 'CategoryController');

    // Resource
    Route::resource('resource/{id}/delete', 'ResourceController@destroy');
    Route::resource('resource/upload', 'ResourceController@upload');
    Route::resource('resource', 'ResourceController');
});

// Reports
Route::get('reports/reservations', 'ReportsController@reservations');
