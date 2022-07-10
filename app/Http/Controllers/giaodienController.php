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
        return view('shop.index',compact('SP','id'));
    }
    public function cart($id){
        return view('shop.cart',compact('id'));
    }
    public function shop($id){
        $SP = DB::table('sanphams')->get();
        return view('shop.shop',compact('id','SP'));
    }


    public function aosomi($id){
        $SP = DB::table('sanphams')->where('loaisp','=','T-Shirt')->get();
        return view('shop.shop',compact('id','SP'));
    }
    public function aothun($id){
        $SP = DB::table('sanphams')->where('loaisp','=','Shirt')->get();
        return view('shop.shop',compact('id','SP'));
    }
    public function aokhoac($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Coart%')->get();
        return view('shop.shop',compact('id','SP'));
    }
    public function quandai($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Trousers%')->get();
        return view('shop.shop',compact('id','SP'));
    }
    public function quandui($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Shorts%')->get();
        return view('shop.shop',compact('id','SP'));
    }
    public function quanjean($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Jeans%')->get();
        return view('shop.shop',compact('id','SP'));
    }



    public function detail($id){
        $SP = DB::table('sanphams')->get();
        return view('shop.detail-product',compact('SP','id'));
    }
    public function detailProduct($id,$idsp){
        $SP = DB::table('sanphams')->find($idsp);
        $hinhanh = DB::table('hinhanhsps')->where('masp',$idsp)->limit(4)->get();
        $check = 1;
        return view('shop.detail',compact('SP','id','hinhanh','check'));
    }

    public function timKiem(Request $req,$id){
        $SP = DB::table('sanphams')->where('tensp','like','%'.$req->search.'%')->get();
        return view('shop.shop',compact('id','SP'));
    }


}
