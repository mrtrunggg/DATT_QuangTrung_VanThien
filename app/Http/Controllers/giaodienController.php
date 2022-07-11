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
        $SP = DB::table('sanphams')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }


    public function aosomi($id){
        $SP = DB::table('sanphams')->where('loaisp','=','T-Shirt')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function aothun($id){
        $SP = DB::table('sanphams')->where('loaisp','=','Shirt')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function aokhoac($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Coart%')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quandai($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Trousers%')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quandui($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Shorts%')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }
    public function quanjean($id){
        $SP = DB::table('sanphams')->where('loaisp','like','%Jeans%')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
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
        $SP = DB::table('sanphams')->where('tensp','like','%'.$req->search.'%')->paginate(8);
        return view('shop.shop',compact('id','SP'))->with('i', (request()->input('page', 1) -1) *8);
    }


}
