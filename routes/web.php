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

//Route::group(['prefix' => '/', 'namespace' => 'FrontEnd'], function () {
    Route::get('/', '\App\Http\Controllers\FrontEnd\LoginController@index');
    Route::get('/detail/{id}/chi-tiet.html', '\App\Http\Controllers\FrontEnd\LoginController@detail');
//});

Route::get('/update-password-admin', function () {
    dd(\Illuminate\Support\Facades\Hash::make(12345678));
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

    Route::group(['prefix' => 'hoc-vien'], function () {
        Route::get('/', 'HocVienController@index');
        Route::get('/create', 'HocVienController@create');
        Route::post('/add', 'HocVienController@store');
        Route::get('/{id}/edit', 'HocVienController@edit');
        Route::post('/{id}/update', 'HocVienController@update');
        Route::post('/search', 'HocVienController@search');
        Route::post('nop-hoc-phi', 'HocVienController@payTuition');
        Route::get('/get-lop-hoc', 'HocVienController@getAllLopHoc');
        Route::get('/get-gia-tien-lop-hoc', 'HocVienController@getPriceOfClass');
        Route::get('/check-voucher', 'HocVienController@checkVoucher');
        Route::get('/get-lop-hoc-bill', 'HocVienController@getLopHocBill');
        Route::get('/get-lop-hoc-using-qua-hoc-phi', 'HocVienController@getLophocUsingHocPhi');
        Route::get('/{id}/delete', 'HocVienController@deleteHocVien');
    });

    Route::group(['prefix' => 'mon-hoc'], function () {
        Route::get('/', 'MonHocController@index');
        Route::get('/create', 'MonHocController@create');
        Route::post('/add', 'MonHocController@store');
        Route::get('{id}/edit', 'MonHocController@edit');
        Route::post('{id}/update', 'MonHocController@update');
        Route::post('/search', 'MonHocController@search');
        Route::get('{id}/delete', 'MonHocController@delete');
    });

    Route::group(['prefix' => 'lop-hoc'], function () {
        Route::get('/', 'LopHocController@index');
        Route::get('/create', 'LopHocController@create');
        Route::post('/add', 'LopHocController@store');
        Route::get('{id}/edit', 'LopHocController@edit');
        Route::post('{id}/update', 'LopHocController@update');
        Route::post('/search', 'LopHocController@search');
        Route::get('{id}/search-hoc-vien', 'LopHocController@searchHocVien');
        Route::get('{id}/them-hoc-vien/{lopHoc}', 'LopHocController@themHocVien');
        Route::get('/hoc-vien/{id}/kick-out', 'LopHocController@kickOut');
        Route::get('{id}/export-student', 'LopHocController@exportStudent');
        Route::post('{id}/add-multi-student', 'LopHocController@addMultiStudent');
    });

    Route::group(['prefix' => 'qua-trinh-hoc'], function () {
        Route::get('/', 'QuaTrinhHocController@index');
        Route::post('/search-hoc-vien', 'QuaTrinhHocController@search');
        Route::get('{id}/show', 'QuaTrinhHocController@show');
        Route::get('{id}/edit', 'QuaTrinhHocController@edit');
        Route::post('{id}/update', 'QuaTrinhHocController@update');
        Route::post('{id}/mark', 'QuaTrinhHocController@mark');
        Route::get('{id}/export-mark', 'QuaTrinhHocController@exportMark');
    });

    Route::group(['prefix' => 'hoc-phi'], function () {
        Route::get('/', 'HocPhiController@index');
        Route::post('/search', 'HocPhiController@search');
        Route::post('/export', 'HocPhiController@export');
        Route::post('/them-chiet-khau/{id}', 'HocPhiController@themChietKhau');
        Route::post('/chinh-sua-chiet-khau/{id}', 'HocPhiController@chinhSuaChietKhau');
        Route::get('/xoa-chiet-khau/{id}', 'HocPhiController@xoaChietKhau');
    });

    Route::group(['prefix' => 'giang-vien'], function () {
        Route::get('/', 'GiangVienController@index');
        Route::post('/search', 'GiangVienController@search');
        Route::get('/create', 'GiangVienController@create');
        Route::post('/add', 'GiangVienController@store');
        Route::get('{id}/edit', 'GiangVienController@edit');
        Route::post('{id}/update', 'GiangVienController@update');
        Route::post('{id}/charge-salary', 'GiangVienController@chargeSalary');
        Route::get('{id}/export-salary', 'GiangVienController@exportSalary');
    });

    Route::group(['prefix' => 'voucher'], function () {
        Route::get('/', 'VoucherController@index');
        Route::post('/search', 'VoucherController@search');
        Route::get('/create', 'VoucherController@create');
        Route::post('/add', 'VoucherController@store');
        Route::get('{id}/delete', 'VoucherController@destroy');
    });

    Route::group(['prefix' => 'canh-bao'], function () {
        Route::get('/', 'CanhBaoController@index');
        Route::post('/search', 'CanhBaoController@search');
        Route::post('/add', 'CanhBaoController@store');
        Route::get('{id}/delete', 'CanhBaoController@destroy');
    });

    Route::group(['prefix' => 'chiet-khau'], function () {
        Route::get('/chi-tiet', 'HocPhiController@detailChietKhau');
    });

    Route::group(['prefix' => 'bai-viet'], function () {
        Route::get('/','BaiVietController@index');
        Route::post('/search','BaiVietController@search');
        Route::get('/add','BaiVietController@create');
        Route::post('/store', 'BaiVietController@store');
        Route::get('/edit/{id}', 'BaiVietController@edit');
        Route::post('/update/{id}', 'BaiVietController@update');
        Route::get('/delete/{id}', 'BaiVietController@delete');
    });

    Route::group(['prefix' => 'sliders'], function () {
        Route::get('/', 'SliderController@index');
        Route::post('/change', 'SliderController@change');
    });

    Route::group(['prefix' => 'slogan'], function () {
         Route::get('/', 'SloganController@index');
         Route::post('/update', 'SloganController@update');
    });

    Route::group(['prefix' => 'about'], function () {
        Route::get('/', 'AboutController@index');
        Route::post('/update', 'AboutController@update');
    });

    Route::group(['prefix' => 'says'], function () {
        Route::get('/', 'SayController@index');
        Route::get('/add', 'SayController@create');
        Route::post('/store', 'SayController@store');
        Route::get('/edit/{id}', 'SayController@edit');
        Route::post('/update/{id}', 'SayController@update');
        Route::get('/delete/{id}', 'SayController@delete');
    });
});
