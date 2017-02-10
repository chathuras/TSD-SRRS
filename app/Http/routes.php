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
Route::get('auth/register', 'Auth\AuthController@register');
Route::post('auth/register_user', 'Auth\AuthController@registerUser');
Route::get('auth/password', 'Auth\AuthController@changePassword');
Route::post('auth/change_password', 'Auth\AuthController@updatePassword');
Route::auth();
// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

Route::get('reservation/categories', 'ReservationController@categories');
Route::get('reservation/reservations', 'ReservationController@reservations');
Route::get('reservation/index', 'ReservationController@index');
Route::get('reservation/resources/category_id/{category_id}',
  'ReservationController@resources');
Route::get('reservation/category/{id}', 'ReservationController@category');
Route::resource('reservation', 'ReservationController');


// Admin only routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('resource', 'ResourceController');
    Route::post('category/upload', 'CategoryController@upload');
    Route::resource('category', 'CategoryController');
});