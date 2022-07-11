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
    public function cart(){
        return view('shop.cart');
    }
    public function shop(){
        $SP = DB::table('sanphams')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }

    public function aosomi(){
        $SP = DB::table('sanphams')->where('loaisp','=','T-Shirt')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function aothun(){
        $SP = DB::table('sanphams')->where('loaisp','=','Shirt')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function aokhoac(){
        $SP = DB::table('sanphams')->where('loaisp','like','%Coart%')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quandai(){
        $SP = DB::table('sanphams')->where('loaisp','like','%Trousers%')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quandui(){
        $SP = DB::table('sanphams')->where('loaisp','like','%Shorts%')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quanjean(){
        $SP = DB::table('sanphams')->where('loaisp','=','T-Shirt')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }

    public function detail(){
        $SP = DB::table('sanphams')->get();
        return view('shop.detail-product',compact('SP'));
    }
    public function detailProduct($idsp){
        $SP = DB::table('sanphams')->find($idsp);
        $hinhanh = DB::table('hinhanhsps')->where('masp',$idsp)->limit(4)->get();
        $check = 1;
        return view('shop.detail',compact('SP','hinhanh','check'));
    }

    public function timKiem(Request $req){
        $SP = DB::table('sanphams')->where('tensp','like','%'.$req->search.'%')->paginate(8);
        return view('shop.shop',compact('SP'))->with('i', (request()->input('page', 1) -1) *8);
    }


}
