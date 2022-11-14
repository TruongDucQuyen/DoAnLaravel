<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\AdminController;
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
Route::get('home-login',[HomeController::class,'index1'])->name('home-login');
Route::get('dang-nhap',[HomeController::class,'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('dang-nhap',[HomeController::class,'xuLyDangNhap'])->name('xl-dang-nhap')->middleware('guest');
Route::get('dang-ky',[HomeController::class,'dangKy'])->name('dang-ky')->middleware('guest');
Route::post('xl-dang-ky',[HomeController::class,'xuLyDangKy'])->name('xl-dang-ky')->middleware('guest');
Route::get('dang-xuat',[HomeController::class,'dangXuat'])->name('dang-xuat')->middleware('auth');

Route::get('dang-bai',[BaiDangController::class,'create'])->name('dang-bai');
Route::post('dang-bai',[BaiDangController::class,'store'])->name('xl-dang-bai');
Route::get('chi-tiet-bai-dang/',[BaiDangController::class,'profile'])->name('chi-tiet-bai-dang');

Route::get('/dashboard',[AdminController::class,'index'])->name('AdminHome');
Route::get('/dangky',[AdminController::class,'dangKy'])->name('dangky');
Route::post('/dang-ky',[AdminController::class,'xuLyDangKy'])->name('xl-dangky');
Route::get('/danh-sach-admin',[AdminController::class,'dsAdmin'])->name('danh-sach-admin');
Route::get('cap-nhat/{id}',[AdminController::class,'edit'])->name('admin.cap-nhat');
Route::post('cap-nhat/{id}',[AdminController::class,'update'])->name('admin.xl-cap-nhat');
Route::get('xoa/{id}',[AdminController::class,'destroy'])->name('admin.xoa');
Route::get('/danh-sach-bai-viet-admin',[AdminController::class,'dsBaiDang'])->name('danh-sach-bai-viet-admin');
Route::get('xoa-bai-dang/{id}',[AdminController::class,'xoaBaiDang'])->name('baidang.xoa');
