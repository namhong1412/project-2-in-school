<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::apiResource('/dat-san', 'setPitchController');
Route::get('/thong-ke', 'setPitchController@statistic');
Route::get('/lich-su', 'setPitchController@history');
Route::get('/hom-nay', 'setPitchController@today');
Route::get('/san-bong-hoat-dong', 'typePitchController@showOn');
Route::group(['middleware' => 'checkAuthorityAdminApi'], function() {
    // quản lý nhân viên
    Route::apiResource('/admin', 'AdminController');
    Route::post('/khoa', 'AdminController@lock');
    Route::post('/mo-khoa', 'AdminController@unlock');
    Route::get('/nhan-vien', 'AdminController@showNhanVien');

    // quản lý khu vực
    Route::apiResource('/khu-vuc', 'typeAreaController');
    Route::get('/khu-vuc-hoat-dong', 'typeAreaController@showOn');

    // quản lý cơ sở
    Route::apiResource('/co-so', 'typeBranchController');
    Route::get('/co-so-hoat-dong', 'typeBranchController@showOn');

    // quản lý sân bóng
    Route::apiResource('/san-bong', 'typePitchController');

    // xoá sân bóng
    Route::delete('/xoa-dat-san/{set_pitch_id}', 'setPitchController@deletePitch');
});
/**
 * Đăng nhập
 */
Route::post('/login', 'LoginController@Login')->middleware('CheckLogin');


