<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use App\Models\hoadonban;
use App\Models\sanpham;
use App\Models\cthoadonban;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
   
        $thongke = hoadonban::select(DB::raw("sum(tongtien) as count"))
            ->whereYear('updated_at', date('Y'))
            ->where('trangthai','2')
            ->groupBy(DB::raw("Month(updated_at)"))
            ->pluck('count');

        $monththongke = hoadonban::select(DB::raw("Month(updated_at) as month"))
            ->whereYear('updated_at', date('Y'))
            ->where('trangthai','2')
            ->groupBy(DB::raw("Month(updated_at)"))
            ->pluck('month');     

        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        $line = [0,0,0,0,0,0,0,0,0,0,0,0];
            //dd($monththongke);
        foreach ($monththongke as $index => $month){


        $tiennhap = sanpham::join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
            ->select('cthoadonbans.sanpham_id','cthoadonbans.soluong','sanphams.giaban','sanphams.dongianhap','cthoadonbans.trangthai',(DB::raw("Month(cthoadonbans.updated_at) as month")))
            ->whereYear('cthoadonbans.updated_at', date('Y'))
            ->where(DB::raw("Month(cthoadonbans.updated_at)"),'=', $month)
            ->get();
 
        $doanhthuban = 0;
        foreach ($tiennhap as $tinhtien){
            $doanhthuban = $doanhthuban + (($tinhtien->soluong * $tinhtien->giaban) - ($tinhtien->soluong  * $tinhtien->dongianhap));
        }
    $index;
    $line[--$month] = $doanhthuban;
    $data[$month] = $thongke[$index];
    }
        return view('admin.quanlyadmin.thongke.index', ['cuccung' =>$data,'line'=>$line]);
    })->name('admin.index22222');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/admin1', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });
});

// // sản phẩm
// Route::group(['prefix' => 'sanpham'], function() {
//     Route::get('index',[sanphamController::class, 'index'])->name('sanpham');
//     Route::get('create',[sanphamController::class, 'create'])->name('themsp');
//     Route::post('xulycreate',[sanphamController::class, 'xulycreate'])->name('xulythemsp');
//     Route::get('edit/{SP}',[sanphamController::class, 'edit'])->name('suasp');
//     Route::post('edit/{SP}',[sanphamController::class, 'xulyedit'])->name('xulysuasp');
//     Route::get('delete/{SP}',[sanphamController::class, 'xulydelete'])->name('xoasp');
// });

// //tai khoan ne
// Route::group(['prefix' => 'taikhoan'], function() {
//     Route::get('index',[qltaikhoanController::class, 'index'])->name('indexTk');
//     Route::get('create',[qltaikhoanController::class, 'create'])->name('formthemTK');
//     Route::post('xulycreate',[qltaikhoanController::class, 'xulycreate'])->name('xylythemTK');
//     Route::get('edit/{TK}',[qltaikhoanController::class, 'edit'])->name('SuaTK');
//     Route::post('edit/{TK}',[qltaikhoanController::class, 'xulyedit'])->name('xylysuaTK');
//     Route::get('delete/{TK}',[qltaikhoanController::class, 'xulydelete'])->name('xylyxoaTK');
// });

// // hoa don ban ne
// Route::group(['prefix' => 'hoadon'], function() {
//     Route::get('index',[hoadonbanController::class, 'index'])->name('indexHdb');
//     // Route::get('create',[hoadonbanController::class, 'create'])->name('formthemTK');
//     // Route::post('xulycreate',[hoadonbanController::class, 'xulycreate'])->name('xylythemTK');
//     // Route::get('edit/{TK}',[hoadonbanController::class, 'edit'])->name('SuaTK');
//     // Route::post('edit/{TK}',[hoadonbanController::class, 'xulyedit'])->name('xylysuaTK');
//     Route::get('delete/{SP}',[hoadonbanController::class, 'xulydelete'])->name('xylyxoaHDB');
//     Route::post('editTTHdb/{SP}',[hoadonbanController::class, 'editTTHdb']);
//     Route::get('view/{SP}',[hoadonbanController::class, 'view'])->name('viewcthd');
// });


// // Bình luận
// Route::group(['prefix' => 'Comment'], function(){
//     Route::get('index',[quanlyCommentController::class, 'index'])->name('indexcomment');
//     Route::post('reply-comment',[quanlyCommentController::class, 'repComment'])->name('repcomment');
// });

// // quản lý nhập kho nè
// Route::group(['prefix' => 'hoadonnhap'], function() {
//     Route::get('index',[nhapkhoController::class, 'index'])->name('indexNK');
//     Route::get('index',[nhapkhoController::class, 'indexnhanvien'])->name('indexNKnhanvien');
//     Route::get('create',[nhapkhoController::class, 'create'])->name('formthemHDN');
//     Route::post('xulycreate',[nhapkhoController::class, 'xulycreate'])->name('xylythemHDN');
//     // Route::get('edit/{TK}',[nhapkhoController::class, 'edit'])->name('SuaTK');
//     // Route::post('edit/{TK}',[nhapkhoController::class, 'xulyedit'])->name('xylysuaTK');
//     Route::post('delete/{SP}',[nhapkhoController::class, 'xulydelete']);
//     Route::post('editTTHdb/{SP}',[nhapkhoController::class, 'editTTHdb']);
//     Route::get('view/{SP}',[nhapkhoController::class, 'view'])->name('viewHDN');
//     Route::get('viewct/{SP}', [nhapkhoController::class, 'viewct'])->name('viewCTHDN');
//     Route::post('xulycreatectsp',[nhapkhoController::class, 'xulycreatectsp'])->name('xylythemCTHDN');
//     Route::get('showctsp/{SP}',[nhapkhoController::class, 'showctsp']);
//     Route::get('timidsp/{SP}',[nhapkhoController::class, 'timidsp']);

//     Route::post('destroy/{SP}',[nhapkhoController::class, 'destroy'])->name('xylyxoaCTHDN');
    
//     Route::get('tongtienne/{SP}',[nhapkhoController::class, 'tongtienne']);

//     Route::get('create2',[nhapkhoController::class, 'create2'])->name('formthemhdn2');
    
// });


// Route::group(['prefix' => 'hinhanh'], function() {
//     Route::get('index',[hinhanhController::class, 'index'])->name('indexHA');
//     Route::get('create',[hinhanhController::class, 'create'])->name('themha');
//     Route::post('xulycreate',[hinhanhController::class, 'xulycreate'])->name('xylythemha');
//     Route::get('delete/{HA}',[hinhanhController::class, 'deleteha'])->name('xylyxoahahehe');
// });

// Route::group(['prefix' => 'thongke'], function() {
//     Route::get('index',[thongkeController::class, 'index'])->name('thongke');
//     Route::post('by-date',[thongkeController::class, 'byDate'])->name('TheoNgay');
// });