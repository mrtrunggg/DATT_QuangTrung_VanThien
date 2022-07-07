<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\taikhoan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class qltaikhoanController extends Controller
{
    function index()
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','=','1')->get();   
        return view('admin.quanlyadmin.taikhoan.index',compact('dstaikhoan'),  ['cuccung' => $data]);
    }

    function create()
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','=','1')->get();
        return view('admin.quanlyadmin.taikhoan.create',compact('dstaikhoan'), ['cuccung' => $data]);
    }

    function xulycreate(Request $req){
        if($req->has('hinhdaidien')){
            $file = $req->hinhdaidien;
            $ext = $req->hinhdaidien->extension();
            $file_name = time().'-'.'account'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } 
        if($req->hinhdaidien == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $TK = new taikhoan();
        $TK->tendangnhap = $req->tendangnhap;
        $TK->password = bcrypt($req -> password);
        $TK->email = $req->email;
        $TK->dienthoai = $req->dienthoai;
        $TK->hinhdaidien = $req->image;
        $TK->hoten = $req->hoten;
        $TK->diachi = $req->diachi;
        $TK->loaitk = $req->loaitk;
        $TK->trangthai = $req->trangthai;
        $TK -> save();
        $dstaikhoan = taikhoan::all();
      
       return redirect()->route('indexTk',compact('dstaikhoan'));
    }

 
    function edit($id)
    {
        $data=1;
        $thongtin = taikhoan::find($id);
        return view('admin.quanlyadmin.taikhoan.edit',compact('thongtin'), ['cuccung' => $data]);
    }

    function xulyedit(Request $req, $id){  

        if($req->has('hinhdaidien')){
            $file = $req->hinhdaidien;
            $ext = $req->hinhdaidien->extension();
            $file_name = time().'-'.'account'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } 
        if($req->hinhdaidien == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $Tk = taikhoan::find($id);
        $Tk->tendangnhap = $req->tendangnhap;
        $Tk->password = bcrypt($req -> password);
        $Tk->email = $req->email;
        $Tk->dienthoai = $req->dienthoai;
        $Tk->hinhdaidien = $req->image;
        $Tk->hoten = $req->hoten;
        $Tk->diachi = $req->diachi;
        $Tk->loaitk = $req->loaitk;
        $Tk->trangthai = $req->trangthai;
        $Tk -> save();    
        $dstaikhoan = taikhoan::all();
       return redirect()->route('indexTk',compact('dstaikhoan'));
    }

    function xulydelete($id){       
        $Tk = taikhoan::find($id);
        $Tk -> trangthai = 0;
        $Tk -> save();
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','=','1')->get();    
        return redirect()->route('indexTk',compact('dstaikhoan'));
    } 
}
