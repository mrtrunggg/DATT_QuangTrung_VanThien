<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class sanphamController extends Controller
{
    function index()
    {
        $data=1;
        $dsSanpham = DB::table('sanphams')->where('trangthai','=','1')->get();   
        return view('admin.quanlyadmin.sanpham.index',compact('dsSanpham'),  ['cuccung' => $data]);
    }

    function create()
    {
        $data=1;
        // $dsLoaisanpham = DB::table('Loaisanpham')->where('trangthai','=','1')->get();
        // $dsNhacungcap = DB::table('Nhacungcap')->where('trangthai','=','1')->get();
        // return view('admin.quanlyadmin.sanpham.create',compact('dsLoaisanpham','dsNhacungcap'));
        return view('admin.quanlyadmin.sanpham.create',['cuccung' => $data]);
    }

    function xulycreate(Request $req){
        $SP = new sanpham();
        $SP->tensp = $req->tensp;
        $SP->loaisp = $req->loaisp;
        $SP->mausac = $req->color;
        $SP->kichthuoc = $req->size;
        $SP->hinhanh = $req->hinhanh;
        $SP->soluong = $req->soluong;
        $SP->giaban = $req->giaban;
        $SP->discount = $req->discount;
        $SP->giakhuyenmai = $req->giakhuyenmai;
        $SP->mota = $req->desc;
        $SP->dongianhap = $req->dongianhap;
        $SP->trangthai = 1;
        $SP -> save();
        $dsSanpham = sanpham::all();
       return redirect()->route('sanpham',compact('dsSanpham'));
    }

 
    function edit($id)
    {
        $data=1;
        $thongtin = Sanpham::find($id);
        // $dsLoaisanpham = DB::table('Loaisanpham')->where('trangthai','=','1')->get();
        // $dsNhacungcap = DB::table('Nhacungcap')->where('trangthai','=','1')->get();
        // return view('ChauTuan.Sanpham.edit',compact('thongtin','dsLoaisanpham','dsNhacungcap'), ['cuccung' => $data]);
        return view('admin.quanlyadmin.sanpham.edit',compact('thongtin'), ['cuccung' => $data]);

    }

    function xulyedit(Request $req, $id){       
        $SP = sanpham::find($id);
        $SP->tensp = $req->tensp;
        $SP->loaisp = $req->loaisp;
        $SP->mausac = $req->color;
        $SP->kichthuoc = $req->size;
        $SP->hinhanh = $req->hinhanh;
        $SP->soluong = $req->soluong;
        $SP->giaban = $req->giaban;
        $SP->discount = $req->discount;
        $SP->giakhuyenmai = $req->giakhuyenmai;
        $SP->mota = $req->desc;
        $SP->dongianhap = $req->dongianhap;
        $SP->trangthai = $req->trangthai;
        $SP -> save();    
        $dsSanpham = sanpham::all();
       return redirect()->route('sanpham',compact('dsSanpham'));
    }

    function xulydelete($id){       
        $SP = sanpham::find($id);
        $SP -> trangthai = 0;
        $SP -> save();
        $dsSanpham = DB::table('sanphams')->where('trangthai','=','1')->get();    
        return redirect()->route('sanpham',compact('dsSanpham'));
    } 
}
