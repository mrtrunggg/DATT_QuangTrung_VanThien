<?php

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
class quanlyCommentController extends Controller
{
    public function index(){
        $data=1;
        $dsbinhluan = DB::table('binhluans')->orderBy('ngaybl','DESC')->paginate(5);
        $dsbl = DB::table('taikhoans')->join('binhluans','taikhoans.id','=','binhluans.taikhoan_id')->orderBy('ngaybl','DESC')->paginate(5);
      
        $tensp = DB::table('sanphams')->where('trangthai','!=','0')->get();
      
        return view('admin.quanlyadmin.binhluan.index',compact('dsbinhluan','dsbl','tensp'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);
    }

    function timkiem(Request $req)
    {
        $data=1;
        $dsbinhluan = DB::table('binhluans')->orderBy('ngaybl','DESC')->where('sanpham_id','=',$req->search)->paginate(10);
        $dsbl = DB::table('taikhoans')->join('binhluans','taikhoans.id','=','binhluans.taikhoan_id')->orderBy('ngaybl','DESC')->where('sanpham_id','=',$req->search)->paginate(10);
      
        $tensp = DB::table('sanphams')->where('trangthai','!=','0')->get();
      
        return view('admin.quanlyadmin.binhluan.index',compact('dsbinhluan','dsbl','tensp'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }

    public function repComment(Request $req){
        $data = $req -> all();
        $binhluan = new binhluan();
        $binhluan -> mota = $data['mota'];
        $binhluan -> sanpham_id = $data['sanpham_id'];
        $binhluan -> traloibinhluan_id = $data['id'];
        $binhluan -> trangthai = 1;
        $binhluan ->ngaybl = Carbon::now();
        $binhluan ->trangthai = 1;
        $binhluan ->save();
    }



    function editTTBL(Request $req){       
        $HDB = binhluan::find($req->id);
        $HDB->trangthai = $req->trangthai;
        $HDB -> update();
        return response()->json($HDB);
    }
    
}
