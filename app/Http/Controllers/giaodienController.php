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
    public function shopao($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Áo%')->get();
        
        return view('shop.shopao',compact('id','SP'));
    }
    public function shopquan($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Quần%')->get();
        
        return view('shop.shopquan',compact('id','SP'));
    }



    public function detail($id){
        $SP = DB::table('sanphams')->get();
        return view('shop.detail-product',compact('SP','id'));
    }
    public function detailProduct($id,$idsp){
        $SP = DB::table('sanphams')->find($idsp);
        
        return view('shop.detail',compact('SP','id'));
    }


}
