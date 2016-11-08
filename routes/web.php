<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('fels');
});

// Authentication Routes...
Route::group(['namespace' => 'Auth'], function () {
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');

    Route::post('register', 'RegisterController@register');

    Route::get('/redirect/{provider}', 'LoginController@redirectToProvider');
    Route::get('auth/callback/{provider}', 'LoginController@handleProviderCallback');
});

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'User'], function(){
    Route::get('profile', 'ProfileController@show');
});
