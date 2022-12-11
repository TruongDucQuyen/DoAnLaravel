<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[HomeController::class,'index'])->name('trang-chu');
//Route::get('home-login',[HomeController::class,'index'])->name('home-login');
Route::get('dang-nhap',[HomeController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/',[HomeController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');
Route::get('dang-ky',[HomeController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::post('xl-dang-ky',[HomeController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');
Route::get('dang-xuat',[HomeController::class,'dangXuat'])->name('dang-xuat')->middleware('auth');
Route::get('thong-tin',[HomeController::class,'edit'])->name('profile');
Route::get('cap-nhat',[HomeController::class,'chinhSuaThongTin'])->name('cap-nhat');
Route::post('cap-nhat',[HomeController::class,'update'])->name('xl-cap-nhat');

Route::get('dang-bai',[BaiDangController::class,'create'])->name('dang-bai');
Route::post('dang-bai',[BaiDangController::class,'store'])->name('xl-dang-bai');
Route::get('/chi-tiet-bai-dang/{id}',[BaiDangController::class,'detail'])->name('chi-tiet-bai-dang');
Route::post('/chi-tiet-bai-dang/{id}',[BinhLuanController::class,'store'])->name('comment');
Route::get('chinh-sua-bai-dang/{id}',[BaiDangController::class,'edit'])->name('chinh-sua-bai-dang');
Route::post('chinh-sua-bai-dang/{id}',[BaiDangController::class,'update'])->name('xl-chinh-sua-bai-dang');
Route::get('xoa-bai-dang-user/{id}',[BaiDangController::class,'destroy'])->name('xoa-bai-dang-user');
Route::get('/tin-tuc',[TinTucController::class,'index'])->name('tin-tuc');
Route::get('/chi-tiet-tin-tuc1/{id}',[TinTucController::class,'detail1'])->name('chi-tiet-tin-tuc1');
Route::post('/report',[ReportController::class,'xlReport'])->name('xlReport');
Route::get('/tin-nhat-do',[HomeController::class,'tinNhatDo'])->name('tin-nhat-do');
Route::get('/tin-mat-do',[HomeController::class,'tinMatDo'])->name('tin-mat-do');
Route::post('/tim-kiem',[HomeController::class,'search'])->name('xl-tim-kiem');
Route::get('/lien-he',[HomeController::class,'lienHe'])->name('lien-he');

//Route::post('/chi-tiet-bai-dang/{id}',[BaiDangController::class,'store'])->name('xl-dang-bai');

Route::get('/dangky',[AdminController::class,'dangKy'])->name('dangky');
Route::post('/dang-ky',[AdminController::class,'xuLyDangKy'])->name('xl-dangky');
Route::middleware('user')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('AdminHome');
    Route::get('/danh-sach-admin',[AdminController::class,'dsAdmin'])->name('danh-sach-admin');
    Route::get('/danh-sach-user',[AdminController::class,'dsUser'])->name('danh-sach-user');
    Route::get('cap-nhat/{id}',[AdminController::class,'edit'])->name('admin.cap-nhat');
    Route::post('cap-nhat/{id}',[AdminController::class,'update'])->name('admin.xl-cap-nhat');
    Route::get('xoa/{id}',[AdminController::class,'destroy'])->name('admin.xoa');
    Route::get('/danh-sach-bai-viet-admin',[AdminController::class,'dsBaiDang'])->name('danh-sach-bai-viet-admin');
    Route::get('xoa-bai-dang/{id}',[AdminController::class,'xoaBaiDang'])->name('baidang.xoa');
    Route::get('admin-chi-tiet-bai-dang/{id}',[AdminController::class,'detailBaiDangChuaXL'])->name('admin.chi-tiet-bai-dang-chua-xl');
    Route::post('admin-chi-tiet-bai-dang/{id}',[AdminController::class,'duyetBai'])->name('admin.xl-duyet-bai');
    Route::get('/danh-sach-tin-tuc-admin',[TinTucController::class,'dsTinTuc'])->name('danh-sach-tin-tuc-admin');
    Route::get('/dang-tin-tuc-admin',[TinTucController::class,'create'])->name('dang-tin-tuc-admin');
    Route::post('/dang-tin-tuc-admin',[TinTucController::class,'store'])->name('xl-dang-tin');
    Route::get('/xoa-tin-tuc/{id}',[TinTucController::class,'xoaTinTuc'])->name('tintuc.xoa');
    Route::get('/chi-tiet-tin-tuc/{id}',[TinTucController::class,'detail'])->name('chi-tiet-tin-tuc');
    Route::get('/danh-sach-report',[ReportController::class,'index'])->name('danh-sach-report');
    Route::get('xoa-report/{id}',[ReportController::class,'destroy'])->name('xoa-report');
    Route::get('/chi-tiet-report/{id}',[ReportController::class,'detail'])->name('chi-tiet-report');
    Route::post('/tim-kiem-admin',[AdminController::class,'search'])->name('xl-tim-kiem-admin');
    Route::get('/chi-tiet-bai-dang-admin/{id}',[BaiDangController::class,'detailAdmin'])->name('chi-tiet-bai-dang-admin');
});
