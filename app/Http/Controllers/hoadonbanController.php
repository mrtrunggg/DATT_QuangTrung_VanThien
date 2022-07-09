<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cthoadonban;
use App\Models\sanpham;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Hoadonban;
use Illuminate\Support\Facades\DB;

class hoadonbanController extends Controller
{
    function index()
    {
        $data=1;
        $dshoadonban = DB::table('hoadonbans')->where('trangthai','!=','0')->get();   
        return view('admin.quanlyadmin.hoadonban.index',compact('dshoadonban'),  ['cuccung' => $data]);
    }

    function xulydelete($id){       
        $HDB = Hoadonban::find($id);
        $HDB -> trangthai = 0;
        $HDB -> save();
        $dsHoadonban = DB::table('hoadonbans')->get();    
        return redirect()->route('indexHdb',compact('dsHoadonban'));
    } 
    
    function editTTHdb(Request $req){       
        $HDB = Hoadonban::find($req->id);
        $HDB->trangthai = $req->trangthai;
        $HDB -> update();
        
        $x = DB::table('cthoadonbans')->where('hoadonban_id','=',$HDB->id)->get();
       
        foreach($x as $b){

            $cthdb = cthoadonban::find($b->id);
            $cthdb -> trangthai = $req->trangthai;
            $cthdb -> update();
            
            $sp = sanpham::find($b->sanpham_id);
            $sp->soluong = $sp->soluong - $b->soluong;
            $sp -> update();
        }
      
        // @dd($HDB);
        return response()->json($HDB);
    } 

    
    function view($id){       
        $data=1;
        $dshoadonban3 = DB::table('hoadonbans')->where('trangthai','!=','0')
                                            ->where('id','=',$id)->get();
<<<<<<< HEAD
        $dscthoadonban = DB::table('cthoadonbans')->where('hoadonban_id','=',$id)->get();
=======
        $dscthoadonban = DB::table('cthoadonbans')
                                            ->where('hoadonban_id','=',$id)->get();
>>>>>>> 84a65fd567abf98a4e0a71e4a366578d282da687
        return view('admin.quanlyadmin.hoadonban.view',compact('dshoadonban3','dscthoadonban'), ['cuccung' => $data]);
    } 
}