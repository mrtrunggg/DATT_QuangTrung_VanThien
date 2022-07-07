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
    public function create($id,$sp){
        $SP = DB::table('sanphams')->find($sp);
        $binhluan = DB::table('taikhoans')->join('binhluans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->get();
        $dsbinhluan = DB::table('binhluans')->get();
        return view('binhluan.index',compact('id','SP','binhluan','dsbinhluan'));
    }

    public function xulyCreate(Request $req,$id,$sp){
       
        if($req->comment == Null){
            $SP = DB::table('sanphams')->find($sp);
            $binhluan = DB::table('binhluans')->join('taikhoans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->get();
            return redirect()->route('writeReview',['id'=>$id,'sp'=>$sp])->with('erro','Please enter comment text!');
        }
        else{
            $newComment = New binhluan();
            $newComment -> taikhoan_id = $id;
            $newComment -> sanpham_id = $sp;
            $newComment -> mota = $req->comment;
            $newComment -> ngaybl = Carbon::now();
            $newComment -> traloibinhluan_id = 0;
            $newComment -> save();
            $SP = DB::table('sanphams')->find($sp);
            $binhluan = DB::table('binhluans')->join('taikhoans','binhluans.taikhoan_id','=','taikhoans.id')->where('sanpham_id','=',$sp)->get();
            return redirect()->route('writeReview',['id'=>$id,'sp'=>$sp])->with('success','Comment successfully sent!');
        }
    }
}
