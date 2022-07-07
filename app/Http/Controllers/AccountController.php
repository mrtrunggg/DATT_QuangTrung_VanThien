<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;
use Hash;
use Illuminate\Mail\Message;
use Illuminate\Mail\Mailable;
class AccountController extends Controller
{
    public function homeAccount($id){
        $user = DB::table('taikhoans')->find($id);
        return view('userAccount.index',compact('id','user'));
    }

    public function changeInformation($id){
        $user = DB::table('taikhoans')->find($id);
        return view('userAccount.information',compact('id','user'));
    }
    public function postChangeInformation(Request $req ,$id){
       
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
        $userchange = DB::table('taikhoans')->where('id',$id)->update(['hinhdaidien'=>$req->image,'hoten'=>$req->hoten,'diachi'=>$req->diachi,'dienthoai'=>$req->dienthoai]);
        $user = DB::table('taikhoans')->find($id);
        return redirect()->route('homeAccount',compact('user','id'));
    }

    public function changePassword($id){
        return view('userAccount.changePassword',compact('id'));
    }
    public function postChangePassword(Request $req, $id){
        $user = DB::table('taikhoans')->find($id);
        if($req->oldpass == Null){
            return redirect()->route('changepassword',compact('id'))->with('notice','Vui lòng nhập mật khẩu cũ!');
        }
        elseif($req->newpass == Null)
        {
            return redirect()->route('changepassword',compact('id'))->with('notice','Vui lòng nhập mật khẩu mới!');
        }
        elseif($req->renewpass == Null){
            return redirect()->route('changepassword',compact('id'))->with('notice','Vui lòng nhập lại mật khẩu mới!');
        }
        elseif($req->newpass != $req->renewpass){
            return redirect()->route('changepassword',compact('id'))->with('notice','Vui lòng nhập lại mật khẩu mới chính xác!');
        }
        elseif(!(Hash::check($req->get('oldpass'),$user->password)))
        {
            return redirect()->route('changepassword',compact('id'))->with('notice','Mật khẩu cũ không chính xác, vui lòng nhập lại!');
        }
        else{
            $pass = DB::table('taikhoans')->where('id',$id)->update(['password'=>bcrypt($req->newpass)]);
            return redirect()->route('changepassword',compact('id'))->with('notice','Thay đổi mật khẩu thành công!');

        }
    }
    public function showHistory($id){
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->get();
        return view('userAccount.show-history',compact('id','hd'));
    }
    public function huydonhang($id,$hds){
        $hdhuy = DB::table('hoadonbans')->where('id','=',$hds)->update(['trangthai'=>0]);
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->get();
        return redirect()->route('showhistory',compact('id','hds'))->with('succes','Hủy thành công');
    }
    public function datlaidon($id,$hds){
        $hdhuy = DB::table('hoadonbans')->where('id','=',$hds)->update(['trangthai'=>1]);
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->get();
        return redirect()->route('showhistory',compact('id','hds'))->with('succes','Đặt lại thành công');
    }
}
