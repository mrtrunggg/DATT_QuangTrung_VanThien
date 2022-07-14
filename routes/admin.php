<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\thongkeController;
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

            $tongdoanhthu = DB::table('sanphams')
            ->select('thanhtien','cthoadonbans.soluong','sanphams.dongianhap')
            ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
            ->where('cthoadonbans.trangthai','=','2')
            ->get();
    
        $tongsanphamkk = DB::table('sanphams')->where('trangthai','=','1')->get();
        $tongtienmuahang = DB::table('hoadonnhaps')
        ->select(DB::raw("sum(tongtien) as tongtien"))
        ->where('trangthai','=','2')
        ->groupBy('trangthai')
        ->get();
            $thongtienne = 0;
            $loinhuanne = 0;
            $tonkhone = 0;
            //dd($tongdoanhthu);
            foreach($tongdoanhthu as $tongtien){
                $thongtienne += $tongtien->thanhtien;
                $loinhuanne += $tongtien->thanhtien - ($tongtien->soluong * $tongtien->dongianhap);
            }
    
            foreach($tongsanphamkk as $tongsp){
                $tonkhone += $tongsp->soluong;
            }

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
            ->select('cthoadonbans.sanpham_id','cthoadonbans.thanhtien','cthoadonbans.soluong','sanphams.giaban','sanphams.dongianhap','cthoadonbans.trangthai',(DB::raw("Month(cthoadonbans.updated_at) as month")))
            ->whereYear('cthoadonbans.updated_at', date('Y'))
            ->where('cthoadonbans.trangthai','=','2')
            ->where(DB::raw("Month(cthoadonbans.updated_at)"),'=', $month)
            ->get();
 
        $doanhthuban = 0;
        foreach ($tiennhap as $tinhtien){
            $doanhthuban += $tinhtien->thanhtien - ($tinhtien->soluong  * $tinhtien->dongianhap);
        }
    $index;
    $line[--$month] = $doanhthuban;
    $data[$month] = $thongke[$index];
    }
    //dd( $line);
        return view('admin.quanlyadmin.thongke.index', compact('tonkhone','thongtienne','loinhuanne','tongtienmuahang'), ['cuccung' =>$data,'line'=>$line]);
    })->name('admin.index22222');

    Route::group(['middleware' => ['auth:admin']], function () {


        Route::get('/', function () {
            $tongdoanhthu = DB::table('sanphams')
            ->select('thanhtien','cthoadonbans.soluong','sanphams.dongianhap')
            ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
            ->where('cthoadonbans.trangthai','=','2')
            ->get();
            
        $tongsanphamkk = DB::table('sanphams')->where('trangthai','=','1')->get();
        $tongtienmuahang = DB::table('hoadonnhaps')
        ->select(DB::raw("sum(tongtien) as tongtien"))
        ->where('trangthai','=','2')
        ->groupBy('trangthai')
        ->get();
    
            $thongtienne = 0;
            $loinhuanne = 0;
            $tonkhone = 0;
            //dd($tongdoanhthu);
            foreach($tongdoanhthu as $tongtien){
                $thongtienne += $tongtien->thanhtien;
                $loinhuanne += $tongtien->thanhtien - ($tongtien->soluong * $tongtien->dongianhap);
            }
    
            foreach($tongsanphamkk as $tongsp){
                $tonkhone += $tongsp->soluong;
            }

        $monththongke = hoadonban::select(DB::raw("Month(updated_at) as month"))
            ->whereYear('updated_at', date('Y'))
            ->where('trangthai','2')
            ->groupBy(DB::raw("Month(updated_at)"))
            ->pluck('month');     

        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        $line = [0,0,0,0,0,0,0,0,0,0,0,0];
            //dd($monththongke);
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
                    ->select('cthoadonbans.sanpham_id','cthoadonbans.thanhtien','cthoadonbans.soluong','sanphams.giaban','sanphams.dongianhap','cthoadonbans.trangthai',(DB::raw("Month(cthoadonbans.updated_at) as month")))
                    ->whereYear('cthoadonbans.updated_at', date('Y'))
                    ->where('cthoadonbans.trangthai','=','2')
                    ->where(DB::raw("Month(cthoadonbans.updated_at)"),'=', $month)
                    ->get();
                $doanhthuban = 0;
                foreach ($tiennhap as $tinhtien){
                    $doanhthuban += $tinhtien->thanhtien - ($tinhtien->soluong  * $tinhtien->dongianhap);
                }
                //dd( $monththongke);
            $index;
            $line[--$month] = $doanhthuban;
            $data[$month] = $thongke[$index];
            }

            return view('admin.quanlyadmin.thongke.index', compact('tonkhone','thongtienne','loinhuanne','tongtienmuahang'), ['cuccung' =>$data,'line'=>$line]);
        })->name('admin.dashboard');
    });
});




// sản phẩm
Route::group(['prefix' => 'sanpham'], function() {
    Route::get('index',[sanphamController::class, 'index'])->name('sanpham');
    Route::get('timkiem',[sanphamController::class, 'timkiem'])->name('timkiemsp');
    Route::get('timkiemloaisp',[sanphamController::class, 'timkiemloaisp'])->name('timkiemloaisp');
    Route::get('create',[sanphamController::class, 'create'])->name('themsp');
    Route::post('xulycreateHDN',[sanphamController::class, 'xulycreateHDN'])->name('xulythemspHDN');
    Route::post('xulycreate',[sanphamController::class, 'xulycreate'])->name('xulythemsp');
    Route::get('edit/{SP}',[sanphamController::class, 'edit'])->name('suasp');
    Route::post('edit/{SP}',[sanphamController::class, 'xulyedit'])->name('xulysuasp');
    Route::get('delete/{SP}',[sanphamController::class, 'xulydelete'])->name('xoasp');
});

//tai khoan ne
Route::group(['prefix' => 'taikhoan'], function() {
    Route::get('index',[qltaikhoanController::class, 'index'])->name('indexTk');
    Route::get('timkiem',[qltaikhoanController::class, 'timkiem'])->name('timkiemtentk');
    Route::get('timkiemloaitk',[qltaikhoanController::class, 'timkiemloaisp'])->name('timkiemloaitk');
    Route::get('create',[qltaikhoanController::class, 'create'])->name('formthemTK');
    Route::post('xulycreate',[qltaikhoanController::class, 'xulycreate'])->name('xylythemTK');
    Route::get('edit/{TK}',[qltaikhoanController::class, 'edit'])->name('SuaTK');
    Route::post('edit/{TK}',[qltaikhoanController::class, 'xulyedit'])->name('xylysuaTK');
    Route::post('editTTTK/{SP}',[qltaikhoanController::class, 'editTTTK']);
    Route::get('delete/{TK}',[qltaikhoanController::class, 'xulydelete'])->name('xylyxoaTK');
    Route::get('information',[qltaikhoanController::class, 'information'])->name('information');
    Route::get('changeinformation',[qltaikhoanController::class, 'changeinformation'])->name('changeinfo');
    Route::post('changeinformation',[qltaikhoanController::class, 'xulyeditthongtin'])->name('editthongtin');
    Route::get('changepasssword',[qltaikhoanController::class, 'changepassword'])->name('changepassw');
    Route::post('changepasssword',[qltaikhoanController::class, 'postrchangepasssword'])->name('editthongtinpass');
});

// hoa don ban ne
Route::group(['prefix' => 'hoadon'], function() {
    Route::get('index',[hoadonbanController::class, 'index'])->name('indexHdb');
    Route::get('timkiem',[hoadonbanController::class, 'timkiem'])->name('timkiemtenhd');
    Route::get('timkiemngaynhaphd',[hoadonbanController::class, 'timkiemngaynhaphd'])->name('timkiemloaihd');
    Route::get('timkiemtheongay',[hoadonbanController::class, 'timkiemtheongay'])->name('timkiemtheongay');
    // Route::get('create',[hoadonbanController::class, 'create'])->name('formthemTK');
    // Route::post('xulycreate',[hoadonbanController::class, 'xulycreate'])->name('xylythemTK');
    // Route::get('edit/{TK}',[hoadonbanController::class, 'edit'])->name('SuaTK');
    // Route::post('edit/{TK}',[hoadonbanController::class, 'xulyedit'])->name('xylysuaTK');
    Route::get('delete/{SP}',[hoadonbanController::class, 'xulydelete'])->name('xylyxoaHDB');
    Route::post('editTTHdb/{SP}',[hoadonbanController::class, 'editTTHdb']);
    Route::get('view/{SP}',[hoadonbanController::class, 'view'])->name('viewcthd');
});


// Bình luận
Route::group(['prefix' => 'Comment'], function(){
    Route::get('index',[quanlyCommentController::class, 'index'])->name('indexcomment');
    Route::post('reply-comment',[quanlyCommentController::class, 'repComment'])->name('repcomment');
    
    Route::post('editTTBL/{SP}',[quanlyCommentController::class, 'editTTBL']);
    
    Route::get('timkiem',[quanlyCommentController::class, 'timkiem'])->name('timkiemsanpham');
});



// quản lý nhập kho nè
Route::group(['prefix' => 'hoadonnhap'], function() {
    Route::get('index',[nhapkhoController::class, 'index'])->name('indexNK');
    Route::get('timkiem',[nhapkhoController::class, 'timkiem'])->name('timkiemnhapkho');
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
    Route::get('timkiem',[hinhanhController::class, 'timkiem'])->name('timkiemha');
    Route::get('create',[hinhanhController::class, 'create'])->name('themha');
    Route::post('xulycreate',[hinhanhController::class, 'xulycreate'])->name('xylythemha');
    Route::get('delete/{HA}',[hinhanhController::class, 'deleteha'])->name('xylyxoahahehe');
});

Route::group(['prefix' => 'thongke'], function() {
    Route::get('index',[thongkeController::class, 'index'])->name('thongke');
    Route::post('by-date',[thongkeController::class, 'byDate'])->name('TheoNgay');

    Route::get('doanhthu',[thongkeController::class, 'tksanpham'])->name('tksanpham');
    Route::get('timkiemspne',[thongkeController::class, 'sptimkiemsp'])->name('sptimkiemsp');
    Route::get('sapxeptheodanhmuc',[thongkeController::class, 'sapxeptheodanhmuc'])->name('sapxeptheodanhmuc');
    Route::get('danhsachsptheongay',[thongkeController::class, 'danhsachsptheongay'])->name('danhsachsptheongay');
});


