<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taikhoanController;
use App\Http\Controllers\qltaikhoanController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\sanphamController;
use App\Http\Controllers\hoadonbanController; 
use App\Http\Controllers\giaodienController;
<<<<<<< HEAD
use App\Http\Controllers\nhapkhoController;
=======
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
<<<<<<< HEAD
use App\Http\Controllers\quanlyCommentController;
use App\Http\Controllers\BinhluanController;
=======
>>>>>>> 082f3be43c374e3fe01a7a3ba36ef4d0fe5b353e
>>>>>>> 917fbfce0bcaf1bcfdb7befaf5b61d3c841d68cc
use App\Models\taikhoan;
use App\Http\Controllers;
use App\Http\Controllers\hinhanhController;

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

<<<<<<< HEAD
// Bình luận
Route::group(['prefix' => 'Comment'], function(){
    Route::get('index',[quanlyCommentController::class, 'index'])->name('indexcomment');
    Route::post('reply-comment',[quanlyCommentController::class, 'repComment'])->name('repcomment');
});
=======
// quản lý nhập kho nè
Route::group(['prefix' => 'hoadonnhap'], function() {
    Route::get('index',[nhapkhoController::class, 'index'])->name('indexNK');
    Route::get('create',[nhapkhoController::class, 'create'])->name('formthemHDN');
    Route::post('xulycreate',[nhapkhoController::class, 'xulycreate'])->name('xylythemHDN');
    // Route::get('edit/{TK}',[nhapkhoController::class, 'edit'])->name('SuaTK');
    // Route::post('edit/{TK}',[nhapkhoController::class, 'xulyedit'])->name('xylysuaTK');
    Route::post('delete/{SP}',[nhapkhoController::class, 'xulydelete']);
    Route::post('editTTHdb/{SP}',[nhapkhoController::class, 'editTTHdb']);
    Route::get('view/{SP}',[nhapkhoController::class, 'view'])->name('viewHDN');
    Route::get('viewct/{SP}', [nhapkhoController::class, 'viewct'])->name('viewCTHDN');
    Route::post('xulycreatectsp',[nhapkhoController::class, 'xulycreatectsp'])->name('xylythemCTHDN');
    Route::get('showctsp/{SP}',[nhapkhoController::class, 'showctsp']);
    Route::get('timidsp/{SP}',[nhapkhoController::class, 'timidsp']);

    Route::post('destroy/{SP}',[nhapkhoController::class, 'destroy'])->name('xylyxoaCTHDN');
    
    Route::get('tongtienne/{SP}',[nhapkhoController::class, 'tongtienne']);

    Route::get('create2',[nhapkhoController::class, 'create2'])->name('formthemhdn2');
    
});


Route::group(['prefix' => 'hinhanh'], function() {
    Route::get('index',[hinhanhController::class, 'index'])->name('indexHA');
    Route::get('create',[hinhanhController::class, 'create'])->name('themha');
    Route::post('xulycreate',[hinhanhController::class, 'xulycreate'])->name('xylythemha');
});
>>>>>>> 917fbfce0bcaf1bcfdb7befaf5b61d3c841d68cc
