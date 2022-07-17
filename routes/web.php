<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\user;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\thongkeController;
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
use App\Http\Controllers\hinhanhController;
use App\Http\Controllers\BinhluanController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use App\Models\hoadonban;
use App\Models\sanpham;
use App\Models\cthoadonban;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
    Route::get('login', [user\UserController::class, 'showLoginForm'])->name('user-login');
    Route::post('login', [user\UserController::class, 'login'])->name('post.user.login');
    Route::get('user-out', [user\UserController::class, 'out'])->name('out');
    Route::get('/', function () {
        //dd(Auth::guard('users')->id());
        return view('shop.index');
    })->name('home-index');

// Route::get('/login',[taikhoanController::class, 'loginShow'])->name('auth.loginShow');
// Route::post('/login',[taikhoanController::class, 'login'])->name('auth.login');
Route::get('/sign-up',[taikhoanController::class, 'show'])->name('auth-show');
Route::post('/sign-up',[taikhoanController::class, 'store'])->name('auth-post');
//Route::get('/cart',[giaodienController::class, 'cart'])->name('cart');
Route::group(['middleware' => ['auth:web']], function(){
    Route::get('/Review/{sp}',[BinhluanController::class,'create'])->name('writeReview');
    Route::post('/Review/{sp}',[BinhluanController::class,'xulyCreate'])->name('xulycreate');



    Route::get('/show-cart',[CartController::class, 'showCart'])->name('showCart');

    Route::post('/save-cart',[CartController::class, 'saveCart'])->name('saveCart');
    Route::get('delete-cart/{idsp}',[CartController::class, 'deleteCart'])->name('deletecart');
Route::post('/update-cart',[CartController::class, 'updateCart'])->name('updatecart');

Route::get('/change-information',[AccountController::class,'changeInformation'])->name('changeinformation');
Route::post('/change-information',[AccountController::class,'postChangeInformation'])->name('postchangeinformation');

Route::get('/change-password',[AccountController::class,'changePassword'])->name('changepassword');
Route::post('/change-password',[AccountController::class,'postChangePassword'])->name('postchangepassword');

Route::get('/account',[AccountController::class,'homeAccount'])->name('homeAccount');


Route::get('/check-out',[CartController::class, 'checkout'])->name('checkout');
Route::post('/check-out',[CartController::class, 'saveCheckout'])->name('savecheckout');


});
//home
Route::get('/forget-password',[taikhoanController::class, 'forgetPass'])->name('auth.forgetPass');
Route::post('/forget-password',[taikhoanController::class, 'postForgetPass']);
//Mã token của quên mật khẩu: mã tài khoản + mã token đã gửi
Route::get('/get-password/{id}/{token}',[taikhoanController::class, 'getPass'])->name('auth.getPass');
Route::post('/get-password/{id}/{token}',[taikhoanController::class, 'postGetPass'])->name('auth.postgetPass');

Route::get('/checkdn',[BinhluanController::class, 'checkne'])->name('checkdn');

Route::get('/shop',[giaodienController::class, 'shop'])->name('shop');
Route::get('/T-shirt',[giaodienController::class, 'aosomi'])->name('aosomi');
Route::get('/shirt',[giaodienController::class, 'aothun'])->name('aothun');
Route::get('/Coat',[giaodienController::class, 'aokhoac'])->name('aokhoac');
Route::get('/Trousers',[giaodienController::class, 'quandai'])->name('quandai');
Route::get('/Shorts',[giaodienController::class, 'quandui'])->name('quandui');
Route::get('/Jeans',[giaodienController::class, 'quanjean'])->name('quanjean');


Route::get('/detail-product',[giaodienController::class, 'detail'])->name('detail');
Route::get('detail/{idsp}',[giaodienController::class, 'detailProduct'])->name('detailproduct');


Route::get('detail/{idsp}/{kichco}',[giaodienController::class, 'detailProductSize'])->name('detailproductsize');

//tim kiem
Route::get('search',[giaodienController::class, 'timKiem'])->name('search');

//Account



Route::get('/Transaction-history',[AccountController::class,'showHistory'])->name('showhistory');
Route::get('/Transaction-history/view-bill/{bill}',[AccountController::class, 'viewBill'])->name('viewbill');
Route::get('/Transaction-history/huy/{hds}',[AccountController::class,'huydonhang'])->name('huy');
Route::get('/Transaction-history/datlai/{hds}',[AccountController::class,'datlaidon'])->name('datlai');


//Binh luan


//cart 



// Quên mật khẩu
