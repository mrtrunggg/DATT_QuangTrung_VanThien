<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taikhoanController;
use App\Http\Controllers\qltaikhoanController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\sanphamController;
use App\Http\Controllers\hoadonbanController; 
use App\Models\taikhoan;
use App\Http\Controllers;
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
// gửi mail

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[taikhoanController::class, 'show'])->name('auth.show');
Route::post('/',[taikhoanController::class, 'store'])->name('auth.post');
Route::get('/login',[taikhoanController::class, 'loginShow'])->name('auth.loginShow');
Route::post('/login',[taikhoanController::class, 'login'])->name('auth.login');

Route::get('/admin1',[adminController::class, 'index'])->name('admin.index');

//home
Route::get('/home',[taikhoanController::class, 'home'])->name('home');
Route::get('/cart',[taikhoanController::class, 'cart'])->name('cart');
Route::get('/shop',[taikhoanController::class, 'shop'])->name('shop');
Route::get('/detail-product',[taikhoanController::class, 'detail'])->name('detail');
Route::get('/check-out',[taikhoanController::class, 'checkout'])->name('checkout');

// Quên mật khẩu
Route::get('/forget-password',[taikhoanController::class, 'forgetPass'])->name('auth.forgetPass');
Route::post('/forget-password',[taikhoanController::class, 'postForgetPass']);
//Mã token của quên mật khẩu: mã tài khoản + mã token đã gửi
Route::get('/get-password/{id}/{token}',[taikhoanController::class, 'getPass'])->name('auth.getPass');
Route::post('/get-password/{id}/{token}',[taikhoanController::class, 'postGetPass'])->name('auth.postgetPass');

// sản phẩm
Route::group(['prefix' => 'sanpham'], function() {
    Route::get('index',[sanphamController::class, 'index'])->name('sanpham');
    Route::get('create',[sanphamController::class, 'create'])->name('themsp');
    Route::post('xulycreate',[sanphamController::class, 'xulycreate'])->name('xulythemsp');
    Route::get('edit/{SP}',[sanphamController::class, 'edit'])->name('suasp');
    Route::post('edit/{SP}',[sanphamController::class, 'xulyedit'])->name('xulysuasp');
    Route::get('delete/{SP}',[sanphamController::class, 'xulydelete'])->name('xoasp');
});

//tai khoan ne
Route::group(['prefix' => 'taikhoan'], function() {
    Route::get('index',[qltaikhoanController::class, 'index'])->name('indexTk');
    Route::get('create',[qltaikhoanController::class, 'create'])->name('formthemTK');
    Route::post('xulycreate',[qltaikhoanController::class, 'xulycreate'])->name('xylythemTK');
    Route::get('edit/{TK}',[qltaikhoanController::class, 'edit'])->name('SuaTK');
    Route::post('edit/{TK}',[qltaikhoanController::class, 'xulyedit'])->name('xylysuaTK');
    Route::get('delete/{TK}',[qltaikhoanController::class, 'xulydelete'])->name('xylyxoaTK');
});

// hoa don ban ne
Route::group(['prefix' => 'hoadon'], function() {
    Route::get('index',[hoadonbanController::class, 'index'])->name('indexHdb');
    // Route::get('create',[hoadonbanController::class, 'create'])->name('formthemTK');
    // Route::post('xulycreate',[hoadonbanController::class, 'xulycreate'])->name('xylythemTK');
    // Route::get('edit/{TK}',[hoadonbanController::class, 'edit'])->name('SuaTK');
    // Route::post('edit/{TK}',[hoadonbanController::class, 'xulyedit'])->name('xylysuaTK');
    Route::get('delete/{SP}',[hoadonbanController::class, 'xulydelete'])->name('xylyxoaHDB');
    Route::post('editTTHdb/{SP}',[hoadonbanController::class, 'editTTHdb']);
    Route::get('view/{SP}',[hoadonbanController::class, 'view'])->name('viewcthd');
});
