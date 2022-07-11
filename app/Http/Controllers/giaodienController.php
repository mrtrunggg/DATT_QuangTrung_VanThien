<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Mail\Message;
use Illuminate\Mail\Mailable;

class giaodienController extends Controller
{
    public function home($id){
        $SP = DB::table('sanphams')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.index',compact('SP','id','KH'));
    }
    public function cart($id){
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.cart',compact('id','KH'));
    }
    public function shop($id){
        $SP = DB::table('sanphams')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }


    public function aosomi($id){
        $KH = DB::table('taikhoans')->find($id);
        $SP = DB::table('sanphams')->where('loaisp','=','T-Shirt')->get();
        return view('shop.shop',compact('id','SP','KH'));
    }
    public function aothun($id){
        $SP = DB::table('sanphams')->where('loaisp','=','Shirt')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }
    public function aokhoac($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Coart%')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }
    public function quandai($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Trousers%')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }
    public function quandui($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Shorts%')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }
    public function quanjean($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Jeans%')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.shop',compact('id','SP','KH'));
    }



    public function detail($id){
        $SP = DB::table('sanphams')->get();
        $KH = DB::table('taikhoans')->find($id);
        return view('shop.detail-product',compact('SP','id','KH'));
    }
    public function detailProduct($id,$idsp){
        $KH = DB::table('taikhoans')->find($id);
        $SP = DB::table('sanphams')->find($idsp);
        $hinhanh = DB::table('hinhanhsps')->where('masp',$idsp)->limit(4)->get();
        $check = 1;
        return view('shop.detail',compact('SP','id','hinhanh','check','KH'));
    }

    public function timKiem(Request $req,$id){
        $KH = DB::table('taikhoans')->find($id);
        $SP = DB::table('sanphams')->where('tensp','like','%'.$req->search.'%')->get();
        return view('shop.shop',compact('id','SP','KH'));
    }


}
