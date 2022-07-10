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
use Illuminate\Support\Facades\Hash;
use Cart;
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
        return redirect()->route('homeAccount',compact('user','id'))->with('succes','Successfully updated personal information!');
    }

    public function changePassword($id){
        return view('userAccount.changePassword',compact('id'));
    }
    public function postChangePassword(Request $req, $id){
        $user = DB::table('taikhoans')->find($id);
        if($req->oldpass == Null){
            return redirect()->route('changepassword',compact('id'))->with('notice1','Please enter old password!');
        }
        elseif($req->newpass == Null)
        {
            return redirect()->route('changepassword',compact('id'))->with('notice1','Please enter a new password!');
        }
        elseif($req->renewpass == Null){
            return redirect()->route('changepassword',compact('id'))->with('notice1','Please re-enter new password!');
        }
        elseif($req->newpass != $req->renewpass){
            return redirect()->route('changepassword',compact('id'))->with('notice1','Please re-enter the correct new password!');
        }
        elseif(!(Hash::check($req->get('oldpass'),$user->password)))
        {
            return redirect()->route('changepassword',compact('id'))->with('notice1','The old password is incorrect, please re-enter!');
        }
        else{
            $pass = DB::table('taikhoans')->where('id',$id)->update(['password'=>bcrypt($req->newpass)]);
            return redirect()->route('changepassword',compact('id'))->with('notice','Password change successful!');

        }
    }
    public function showHistory($id){
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->orderBy('id','DESC')->get();
        return view('userAccount.show-history',compact('id','hd'));
    }
    public function huydonhang($id,$hds){
        $hdhuy = DB::table('hoadonbans')->where('id','=',$hds)->update(['trangthai'=>0]);
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->get();
        return redirect()->route('showhistory',compact('id','hd'))->with('succes','Order canceled successfully!');
    }
    public function datlaidon($id,$hds){
        $hdhuy = DB::table('hoadonbans')->where('id','=',$hds)->update(['trangthai'=>1]);
        $hd = DB::table('hoadonbans')->where('khachhang_id','=',$id)->get();
        return redirect()->route('showhistory',compact('id','hd'))->with('succes','Your canceled order has been successfully reset!');
    }
    public function viewBill($id,$bill){
        $cthd = DB::table('cthoadonbans')->where('hoadonban_id','=',$bill)->get();
        $hda = DB::table('hoadonbans')->find($bill);
       // dd($hd);
        Cart::destroy();
        foreach($cthd as $hd)
        {
            $product_info = DB::table('sanphams')->find($hd->sanpham_id);
            $data['id'] = $product_info->id;
            $data['qty'] = $hd->soluong;
            $data['name'] = $product_info->tensp;
            $data['price'] = $hd->dongia;
            $data['weight'] = 0;
            $data['options']['image'] = $product_info->hinhanh;
            //dd($data);
            Cart::add($data);  
        }
        $content = Cart::content();
        return view('userAccount.viewbill',compact('id','bill','content','hda'));
    }
}