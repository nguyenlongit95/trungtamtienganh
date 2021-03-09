<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['prefix' => '/admin', 'namespace' => '\App\Http\Controllers\Auth'], function () {
    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@logout');
});

Route::get('login', '\App\Http\Controllers\FrontEnd\LoginController@login');
Route::post('login', '\App\Http\Controllers\FrontEnd\LoginController@postLogin');
Route::get('register', '\App\Http\Controllers\FrontEnd\LoginController@register');
Route::post('register', '\App\Http\Controllers\FrontEnd\LoginController@postRegister');
Route::get('logout', '\App\Http\Controllers\FrontEnd\LoginController@logout');
Route::get('forgot-password', '\App\Http\Controllers\FrontEnd\LoginController@forgotPassword');
Route::post('forgot-password', '\App\Http\Controllers\FrontEnd\LoginController@forgotPassword');

Route::group(['middleware' => 'checkUserLogin', 'namespace' => 'FrontEnd'], function () {
    // Route front end has required login
});

/**
 * Route admin panel
 * Middelware
 */
Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashBoardController@index');

});
