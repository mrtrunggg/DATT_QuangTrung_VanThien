<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taikhoanController;
use App\Http\Controllers\qltaikhoanController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\sanphamController;
use App\Http\Controllers\hoadonbanController; 
use App\Http\Controllers\giaodienController;
use App\Http\Controllers\nhapkhoController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\quanlyCommentController;
use App\Http\Controllers\BinhluanController;
use App\Models\taikhoan;
use App\Http\Controllers;
use App\Http\Controllers\hinhanhController;
use Illuminate\Support\Facades\Auth;
Auth::routes();

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



//home
Route::get('/home/{id}',[giaodienController::class, 'home'])->name('home');
Route::get('/cart/{id}',[giaodienController::class, 'cart'])->name('cart');

Route::get('/shop/{id}',[giaodienController::class, 'shop'])->name('shop');
Route::get('shop/shirt/{id}',[giaodienController::class, 'shopao'])->name('shopao');
Route::get('shop/trousers/{id}',[giaodienController::class, 'shopquan'])->name('shopquan');


Route::get('/detail-product/{id}',[giaodienController::class, 'detail'])->name('detail');
Route::get('detail/{id}/{idsp}',[giaodienController::class, 'detailProduct'])->name('detailproduct');


//Account
Route::get('/account/{id}',[AccountController::class,'homeAccount'])->name('homeAccount');

Route::get('/change-information/{id}',[AccountController::class,'changeInformation'])->name('changeinformation');
Route::post('/change-information/{id}',[AccountController::class,'postChangeInformation'])->name('postchangeinformation');

Route::get('/change-password/{id}',[AccountController::class,'changePassword'])->name('changepassword');
Route::post('/change-password/{id}',[AccountController::class,'postChangePassword'])->name('postchangepassword');

Route::get('/Transaction-history/{id}',[AccountController::class,'showHistory'])->name('showhistory');
Route::get('/Transaction-history/view-bill/{id}/{bill}',[AccountController::class, 'viewBill'])->name('viewbill');
Route::get('/Transaction-history/huy/{id}/{hds}',[AccountController::class,'huydonhang'])->name('huy');
Route::get('/Transaction-history/datlai/{id}/{hds}',[AccountController::class,'datlaidon'])->name('datlai');

//Binh luan
Route::get('/Review/{id}/{sp}',[BinhluanController::class,'create'])->name('writeReview');
Route::post('/Review/{id}/{sp}',[BinhluanController::class,'xulyCreate'])->name('xulycreate');

//cart 
Route::get('/show-cart/{id}',[CartController::class, 'showCart'])->name('showCart');

Route::post('/save-cart/{id}',[CartController::class, 'saveCart'])->name('saveCart');
Route::get('delete-cart/{id}/{idSP}',[CartController::class, 'deleteCart'])->name('deletecart');
Route::post('/update-cart/{id}',[CartController::class, 'updateCart'])->name('updatecart');

Route::get('/check-out/{id}',[CartController::class, 'checkout'])->name('checkout');
Route::post('/check-out/{id}',[CartController::class, 'saveCheckout'])->name('savecheckout');


// Quên mật khẩu
Route::get('/forget-password',[taikhoanController::class, 'forgetPass'])->name('auth.forgetPass');
Route::post('/forget-password',[taikhoanController::class, 'postForgetPass']);
//Mã token của quên mật khẩu: mã tài khoản + mã token đã gửi
Route::get('/get-password/{id}/{token}',[taikhoanController::class, 'getPass'])->name('auth.getPass');
Route::post('/get-password/{id}/{token}',[taikhoanController::class, 'postGetPass'])->name('auth.postgetPass');








