<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cthoadonnhap;
use App\Models\hoadonnhap;
use App\Models\sanpham;
use App\Models\hinhanhsp;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\taikhoan;
use DateTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class hinhanhController extends Controller
{
    function index()
    {
        $data=1;
        $tensp= DB::table('sanphams')->where('trangthai','!=','0')->get();
        $dshinhanh = DB::table('hinhanhsps')->where('trangthai','!=','0')->get();   
        return view('admin.quanlyadmin.hinhanh.index',compact('dshinhanh','tensp'),  ['cuccung' => $data]);
    }

    
    function create()
    {
        $data=1;
        // $dstaikhoanlaphd = DB::table('taikhoans')->where('trangthai','=','1')
        //                                         ->where('loaitk','=','1')
        //                                         ->get();
        // $dssplaphd = DB::table('sanphams')
        // ->where('trangthai','=','1')
        // ->get();
        return view('admin.quanlyadmin.hinhanh.create', ['cuccung' => $data]);
    }
    
}