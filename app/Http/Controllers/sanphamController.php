<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
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
        $dsSanpham = DB::table('sanphams')->where('trangthai','=','1')->paginate(5);

        return view('admin.quanlyadmin.sanpham.index',compact('dsSanpham'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);
    }

    function timkiem(Request $req)
    {
        $data=1;
        $dsSanpham = DB::table('sanphams')->where('trangthai','=','1')->where('tensp','like','%'.$req->search.'%')->paginate(10); 
       
        return view('admin.quanlyadmin.sanpham.index',compact('dsSanpham'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }
    function timkiemloaisp(Request $req)
    {
        $data=1;
        $dsSanpham = DB::table('sanphams')->where('trangthai','=','1')->where('loaisp','=',$req->searchloaisp)->paginate(10);;   
        return view('admin.quanlyadmin.sanpham.index',compact('dsSanpham'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
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
        
        if($req->has('hinhanh')){
            $file = $req->hinhanh;
            $ext = $req->hinhanh->extension();
            $file_name = time().'-'.$req->size.'-'.'prtoduct'.'-'.$req->color.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        if($req->hinhanh == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $SP = new sanpham();
        $SP->tensp = $req->tensp;
        $SP->loaisp = $req->loaisp;
        $SP->mausac = $req->color;
        $SP->hinhanh = $req->image;
        $SP->mota = $req->desc;
        $SP->trangthai = 1;
        $SP -> save();
        $dsSanpham = sanpham::all();
       return redirect()->route('sanpham',compact('dsSanpham'));


    }

    function xulycreateHDN(Request $req){
        
        if($req->has('hinhanh')){
            $file = $req->hinhanh;
            $ext = $req->hinhanh->extension();
            $file_name = time().'-'.$req->size.'-'.'prtoduct'.'-'.$req->color.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        if($req->hinhanh == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $SP = new sanpham();
        $SP->tensp = $req->tensp;
        $SP->loaisp = $req->loaisp;
        $SP->mausac = $req->color;
        $SP->kichthuoc = $req->size;
        $SP->hinhanh = $req->image;
        $SP->soluong = $req->soluong;
        $SP->giaban = $req->giaban;
        $SP->discount = $req->discount;
        $SP->giakhuyenmai = $req->giakhuyenmai;
        $SP->mota = $req->desc;
        $SP->dongianhap = $req->dongianhap;
        $SP->trangthai = 1;
        $SP -> save();
        $dsSanpham = sanpham::all();
       return redirect()->route('formthemHDN',compact('dsSanpham'));
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
        if($req->has('hinhanh')){
            $file = $req->hinhanh;
            $ext = $req->hinhanh->extension();
            $file_name = time().'-'.$req->size.'-'.'prtoduct'.'-'.$req->color.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        if($req->hinhanh == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $SP = sanpham::find($id);
        $SP->tensp = $req->tensp;
        $SP->loaisp = $req->loaisp;
        $SP->mausac = $req->color;
        $SP->hinhanh = $req->image;
        $SP->mota = $req->desc;
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
