<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Hoadonnhap;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class quanlyhoadonnhapController extends Controller
{
    function index()
    {
        $dsHoadonnhap = DB::table('Hoadonnhap')->where('trangthai','=','1')->get();   
        return view('QuangTrung.Hoadonnhap.index',compact('dsHoadonnhap'));
    }

    function create()
    {
        $dsHoadonnhap = DB::table('Nhacungcap')->where('trangthai','=','1')->get();
        $dsHoadonnhap1 = DB::table('Nhanvien')->where('trangthai','=','1')->get();
        return view('QuangTrung.Hoadonnhap.create',compact('dsHoadonnhap','dsHoadonnhap1'));
    }

    function xulycreate(Request $req){
        $HDN = new Hoadonnhap();
        $HDN->nhacungcap_id = $req->MaNCC;
        $HDN->nhanvien_id = $req->MaNV;
        $HDN->ngaylap = $req->NgaylapHD;
        $HDN->tongtien = $req->Tongtien;
        $HDN->ghichu = $req->Ghichu;
        $HDN->trangthai = $req->trangthai;
        $HDN -> save();
        $dsHoadonnhap = Hoadonnhap::all();
       return redirect()->route('indexHDN',compact('dsHoadonnhap'));
    }

 
    function edit($id)
    {
        $thongtin = Hoadonnhap::find($id);
        $dsHoadonnhap = DB::table('Nhacungcap')->where('trangthai','=','1')->get();
        $dsHoadonnhap1 = DB::table('Nhanvien')->where('trangthai','=','1')->get();
        return view('QuangTrung.Hoadonnhap.edit',compact('thongtin','dsHoadonnhap','dsHoadonnhap1'));
    }

    function xulyedit(Request $req, $id){       
        $HDN = Hoadonnhap::find($id);
        $HDN->nhacungcap_id = $req->MaNCC;
        $HDN->nhanvien_id = $req->MaNV;
        $HDN->ngaylap = $req->NgaylapHD;
        $HDN->tongtien = $req->Tongtien;
        $HDN->ghichu = $req->Ghichu;
        $HDN->trangthai = $req->trangthai;
        $HDN -> save();    
        $dsHoadonnhap = Hoadonnhap::all();
       return redirect()->route('indexHDN',compact('dsHoadonnhap'));
    }

    function xulydelete($id){       
        $HDN = Hoadonnhap::find($id);
        $HDN -> trangthai = 0;
        $HDN -> save();
        $dsHoadonnhap = DB::table('Hoadonnhap')->where('trangthai','=','1')->get();    
        return redirect()->route('indexHDN',compact('dsHoadonnhap'));
    }
}
