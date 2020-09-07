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

Route::group(['middleware' => 'CheckLogged'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/quan-ly-san-bong', function () {
        return view('quan-ly-san-bong');
    });

    Route::get('/dat-san', function () {
        return view('dat-san');
    });

    Route::get('/dat-san/{set_pitch_id}', function ($set_pitch_id) {
        return view('dat-san', ['set_pitch_id' => $set_pitch_id]);
    });

    Route::get('/lich-dat-san', function () {
        return view('lich-dat-san');
    });
});
Route::group(['middleware' => 'CheckQuanLy'], function () {

    // Thêm nhân viên
    Route::get('/them-nhan-vien', function () {
        return view('them-nhan-vien');
    });

    // sửa nhân viên
    Route::get('/sua-nhan-vien/{admin_id}', function ($admin_id) {
        return view('them-nhan-vien', ['admin_id' => $admin_id]);
    });

    // quản lý nhân viên
    Route::get('/quan-ly-nhan-vien', function () {
        return view('quan-ly-nhan-vien');
    });

    // quản lý vực, cơ sở,  sân bóng
    Route::get('/quan-ly-san-bong', function () {
        return view('quan-ly-san-bong');
    });

    // Thêm khu vực, cơ sở,  sân bóng
    Route::get('/them-san-bong', function () {
        return view('them-san-bong');
    });

    // sửa nhân khu vực
    Route::get('/sua-san-bong/khu-vuc/{area_id}', function ($area_id) {
        return view('them-san-bong', ['area_id' => $area_id]);
    });

    // sửa cơ sở
    Route::get('/sua-san-bong/co-so/{branch_id}', function ($branch_id) {
        return view('them-san-bong', ['branch_id' => $branch_id]);
    });

    // sửa sân bóng
    Route::get('/sua-san-bong/san-bong/{pitch_id}', function ($pitch_id) {
        return view('them-san-bong', ['pitch_id' => $pitch_id]);
    });
});
// Đăng nhập
Route::get('/login', function () {
    return view('login');
})->middleware('CheckLoggedLoginPage')->name('login');

// Đăng xuất
Route::get('/logout', 'LoginController@Logout');
