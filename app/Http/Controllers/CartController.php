<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use App\Models\hoadonban;
use App\Models\cthoadonban;
use App\Models\chitietsanpham;
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
session_start();
class CartController extends Controller
{
    public function saveCart(Request $req){
        $productID = $req->product_id_hidden;
        $quantity = $req->quantity;
        $product_info = DB::table('sanphams')->find($productID);
        $product_info_sale = DB::table('chitietsanphams')->where('sanpham_id',$productID)
        ->where('kichthuoc',$req->size)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // dd(Cart::content());
        // Cart::destroy();
            $data['id'] = $productID;
            $data['qty'] = $quantity;
            $data['name'] = $product_info->tensp;
            if($product_info_sale->discount == 0){
                $data['price'] = $product_info_sale->giaban;
            }
            else{
                $data['price'] = $product_info_sale->giakhuyenmai;
            }
            $data['weight'] = 0;
            $data['options']['image'] = $product_info->hinhanh;
            $data['options']['size'] = $product_info_sale->kichthuoc;
            Cart::add($data);
        //dd($data);
        return redirect()->route('showCart');
    }
    public function showCart(){
        $content = Cart::content();
        return view('cart.showcart',compact('content'));
    }
    public function deleteCart($idsp){
        Cart::update($idsp,0);
        return redirect()->route('showCart');
    }
    public function updateCart(Request $req){
        $rowId = $req->rowID;
        $qty = $req->cart_quantity;
        Cart::update($rowId,$qty);
        return redirect()->route('showCart');
        
    }

    public function checkout(){
        $content = Cart::content();
        $KH = DB::table('taikhoans')->find(Auth::user()->id);
        return view('shop.checkout',compact('content','KH'));
    }

    public function saveCheckout(Request $req){
        $content = Cart::content();
        
        foreach($content as $check)
        {
            $idsp = DB::table('sanphams')->where('tensp','like',$check->name)->first();
            $chitietsanpham = DB::table('chitietsanphams')->where('sanpham_id',$idsp->id)
            ->where('kichthuoc',$check->options->size)->first();
            if($chitietsanpham->soluong < $check ->qty)
            {
                return redirect()->route('showCart')->with('erro','Product '.$idsp->tensp.' only '.$chitietsanpham->soluong.' products in stock, please choose less quantity!');
            }
        }

        $thongtin1 = Null;
        $thongtin2 = Null;
        $tk = DB::table('taikhoans')->find(Auth::user()->id);
        if($req->check == 1){
            return redirect()->route('checkout')->with('erro1','Please select product before ordering!');
        }
        else{
        if($req ->fullname == Null){
            $thongtin1 = $tk->tendangnhap;
        }
        else{
            $thongtin1 = $req->fullname;
        
        }
        if($req->email == Null){
            $thongtin2 = $tk->email;
        }
        else{
            $thongtin2 = $req->email;
        }
        if($req->address == Null){
            return redirect()->route('checkout')->with('erro1','Please enter your delivery address');
        }
        elseif($req->phoneNo == Null){
            return redirect()->route('checkout')->with('erro1','Please enter the phone number!');
        }
        $tongtien = 0;
        $NewHD = new hoadonban();
        $NewHD ->khachhang_id = Auth::user()->id;
        $NewHD -> ngaylap = Carbon::now();
        $NewHD -> mota = $req->comment;
        $NewHD ->thongtinnguoinhan = $thongtin1;
        $NewHD ->email_nguoinhan = $thongtin2;
        $NewHD -> sodienthoai_nguoinhan = $req->phoneNo;
        $NewHD -> diachi_nguoinhan = $req->address;
        $NewHD -> trangthai = 1;
        $NewHD -> tongtien = 1;
        $NewHD ->save();
        foreach($content as $cthd){
            $newcthd = new cthoadonban();
            $newcthd ->hoadonban_id = $NewHD->id;
            $idsp = DB::table('sanphams')->where('tensp','=',$cthd->name)->first();
            $newcthd -> sanpham_id = $idsp->id;
            $newcthd -> soluong = $cthd ->qty;
            $newcthd -> dongia = $cthd -> price;
            $newcthd -> kichco = $cthd -> options-> size;
            $newcthd ->thanhtien = $cthd->price * $cthd->qty;
            $newcthd -> trangthai = 0;
            $tongtien = $tongtien +  $newcthd ->thanhtien;
            $newcthd->save();
        }

        $NewHD -> tongtien = $tongtien;
        $NewHD ->save();
        Cart::destroy();
        $id = Auth::user()->id;
        return redirect()->route('showhistory',compact('id'))->with('succes','Order Success!');
       }
    }
    
}