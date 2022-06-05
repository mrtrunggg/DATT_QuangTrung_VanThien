<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taikhoanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[taikhoanController::class, 'show'])->name('auth.show');
Route::post('/',[taikhoanController::class, 'store'])->name('auth.post');
Route::get('/login',[taikhoanController::class, 'loginShow'])->name('auth.loginShow');
Route::post('/login',[taikhoanController::class, 'login'])->name('auth.login');