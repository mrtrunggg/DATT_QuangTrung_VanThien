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
        $dshinhanh = DB::table('hinhanhsps')->where('trangthai','!=','0')->paginate(5);   
        return view('admin.quanlyadmin.hinhanh.index',compact('dshinhanh','tensp'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);
    }

    function timkiem(Request $req)
    {

        $data=1;
        $tensp= DB::table('sanphams')->where('trangthai','!=','0')->get();
        $dshinhanh = DB::table('hinhanhsps')->where('trangthai','!=','0')->where('masp','=',$req->search)->paginate(5);   
        return view('admin.quanlyadmin.hinhanh.index',compact('dshinhanh','tensp'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);
    }

    function create()
    {
        $data=1;
        $dssanpham =  DB::table('sanphams')->where('trangthai','=','1')->get(); 
        return view('admin.quanlyadmin.hinhanh.create',compact('dssanpham'), ['cuccung' => $data]);
    }


    function xulycreate(Request $req){
        
        $input=$req->all();
        $images=array();
        if($files=$req->file('filename')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('filename',$name);
                $images[]=$name; 
            }
        };
        for($i =0 ; $i < count($images) ; $i++){
            $KH = new hinhanhsp();
            $KH->masp = $req->masp;
            $KH->tenhinhanh = $images[$i];
            $KH->save();
        }  

        $dsanhmausanpham = hinhanhsp::all();
       return redirect()->route('indexHA',compact('dsanhmausanpham'));
    }

    function deleteha($id){       
        $KH = hinhanhsp::find($id);
        hinhanhsp::where('id', $id)->delete();
        $dsanhmausanpham = DB::table('hinhanhsps')->get();    
        return redirect()->route('indexHA',compact('dsanhmausanpham'));
    }


    
    
}