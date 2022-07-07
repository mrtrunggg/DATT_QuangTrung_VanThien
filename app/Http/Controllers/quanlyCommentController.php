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
        $dsbinhluan = DB::table('binhluans')->orderBy('ngaybl','DESC')->get();
        $dsbl = DB::table('taikhoans')->join('binhluans','taikhoans.id','=','binhluans.taikhoan_id')->orderBy('ngaybl','DESC')->get();
        return view('admin.quanlyadmin.binhluan.index',compact('dsbinhluan','dsbl'),  ['cuccung' => $data]);
    }
    public function repComment(Request $req){
        $data = $req -> all();
        $binhluan = new binhluan();
        $binhluan -> mota = $data['mota'];
        $binhluan -> sanpham_id = $data['sanpham_id'];
        $binhluan -> traloibinhluan_id = $data['id'];
        $binhluan ->ngaybl = Carbon::now();
        $binhluan ->save();
    }
}
