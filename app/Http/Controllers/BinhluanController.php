<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use App\Models\hoadonban;
use App\Models\cthoadonban;
use App\Models\binhluan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;
use Session;
use Illuminate\Mail\Message;
use Cart;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Carbon\Carbon;
class BinhluanController extends Controller
{
    public function create($sp){
        $SP = DB::table('sanphams')->find($sp);
        $binhluan = DB::table('taikhoans')->join('binhluans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->orderBy('binhluans.trangthai','DESC')->get();
        $dsbinhluan = DB::table('binhluans')->get();
        $ctsanpham = DB::table('chitietsanphams')->where('sanpham_id','=',$sp)->first();
        return view('binhluan.index',compact('SP','binhluan','dsbinhluan','ctsanpham'));
    }
    public function checkne(){
        return redirect()->route('user-login')->with('erro','Please log in!');
    }

    public function xulyCreate(Request $req,$sp){
       
        if($req->comment == Null){
            $SP = DB::table('sanphams')->find($sp);
            $binhluan = DB::table('binhluans')->join('taikhoans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->orderBy('binhluans.trangthai','DESC')->get();
            return redirect()->route('writeReview',['sp'=>$sp])->with('erro','Please enter comment text!');
        }
        else{
            $newComment = New binhluan();
            $newComment -> taikhoan_id = Auth::user()->id;
            $newComment -> sanpham_id = $sp;
            $newComment ->trangthai = 1;
            $newComment -> mota = $req->comment;
            $newComment -> ngaybl = Carbon::now();
            $newComment -> traloibinhluan_id = 0;
            $newComment -> save();
            $SP = DB::table('sanphams')->find($sp);
            $binhluan = DB::table('binhluans')->join('taikhoans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->orderBy('binhluans.trangthai','DESC')->get();
            return redirect()->route('writeReview',['sp'=>$sp])->with('success','Comment successfully sent!');
        }
    }
}
