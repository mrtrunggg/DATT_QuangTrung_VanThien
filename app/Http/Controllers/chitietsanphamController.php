<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\chitietsanpham;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;

class chitietsanphamController extends Controller
{
    function index($id)
    {
        $data=1;
        $tensp= DB::table('sanphams')->where('trangthai','!=','0')->get();
        $dsSanpham = DB::table('chitietsanphams')->where('trangthai','=','1')->where('sanpham_id','=',$id)->paginate(5);
        $idsp = $id;
        return view('admin.quanlyadmin.chitietsanpham.index',compact('dsSanpham','idsp','tensp'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);
    }

    function create($id)
    {
        $data=1;
        $dsSanpham = sanpham::find($id);
        $idsp = $id;
        return view('admin.quanlyadmin.chitietsanpham.create',compact('dsSanpham','idsp'), ['cuccung' => $data]);
    }

    function xulycreate(Request $req){
        $SP = new chitietsanpham();
        $SP->sanpham_id = $req->sanpham_id;
        $SP->kichthuoc = $req->kichthuoc;
        $SP->soluong = $req->soluong;
        $SP->giaban = $req->giaban;
        $SP->discount = $req->discount;
        $SP->giakhuyenmai = $req->giakhuyenmai;
        $SP->trangthai = 1;
        $SP -> save();
        $dsSanpham = chitietsanpham::all();
        return redirect()->route('chitietsanpham', ['SP' => $req->sanpham_id]);
    }


    function xulydelete($id){    
        $SP = chitietsanpham::find($id);
        $SP -> trangthai = 0;
        $SP -> save();
        return back();
    } 


    function edit($id)
    {
        $data=1;
       
        $thongtin = chitietsanpham::find($id);
        // $dsLoaisanpham = DB::table('Loaisanpham')->where('trangthai','=','1')->get();
        // $dsNhacungcap = DB::table('Nhacungcap')->where('trangthai','=','1')->get();
        // return view('ChauTuan.Sanpham.edit',compact('thongtin','dsLoaisanpham','dsNhacungcap'), ['cuccung' => $data]);
        return view('admin.quanlyadmin.chitietsanpham.edit',compact('thongtin'), ['cuccung' => $data]);

    }



    function xulyedit(Request $req){    
   
        
        $SP = chitietsanpham::find($req->id);
       
        $SP->kichthuoc = $req->size;
        $SP->soluong = $req->soluong;
        $SP->giaban = $req->giaban;
        $SP->discount = $req->discount;
        $SP->giakhuyenmai = $req->giakhuyenmai;
        $SP->trangthai = $req->trangthai;
        $SP -> save();
        return redirect()->route('chitietsanpham', ['SP' => $SP->sanpham_id]);
    }





}
