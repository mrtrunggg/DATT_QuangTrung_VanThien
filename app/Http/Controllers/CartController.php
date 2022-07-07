<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use App\Models\hoadonban;
use App\Models\cthoadonban;
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
    public function saveCart(Request $req,$id){
        $productID = $req->product_id_hidden;
        $quantity = $req->quantity;

        $product_info = DB::table('sanphams')->find($productID);
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // dd(Cart::content());
        // Cart::destroy();
        
        $data['id'] = $productID;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->tensp;
        $data['price'] = $product_info->giaban;
        $data['weight'] = 0;
        $data['options']['image'] = $product_info->hinhanh;
        //dd($data);
        Cart::add($data);
        return redirect()->route('showCart',$id);
    }
    public function showCart($id){
        $content = Cart::content();
        return view('cart.showcart',compact('id','content'));
    }
    public function deleteCart($id,$idSP){
        Cart::update($idSP,0);
        return redirect()->route('showCart',$id);
    }
    public function updateCart(Request $req,$id){
        $rowId = $req->rowID;
        $qty = $req->cart_quantity;
        Cart::update($rowId,$qty);
        return redirect()->route('showCart',$id);
        
    }

    public function checkout($id){
        $content = Cart::content();
        return view('shop.checkout',compact('id','content'));
    }

    public function saveCheckout(Request $req, $id){
        $content = Cart::content();
        foreach($content as $check)
        {
            $idsp = DB::table('sanphams')->where('tensp','=',$check->name)->first();
            if($idsp->soluong < $check ->qty)
            {
                return redirect()->route('showCart',$id)->with('erro','Product "'.$idsp->tensp.'" only "'.$idsp->soluong.'" products in stock, please choose less quantity!');
            }
        }

        $thongtin = Null;
        $tk = DB::table('taikhoans')->find($id);
        if($req->check == 1){
            return redirect()->route('checkout',$id)->with('erro1','Please select product before ordering!');
        }
        else{
        if($req ->fullname == Null){
            $thongtin = $tk->tendangnhap;
        }
        else{
            $thongtin = $req->fullname;
        
        }
        if($req->email == Null){
            $thongtin = $thongtin.' - '.$tk->email;
        }
        else{
            $thongtin = $thongtin.' - '.$req->email;
        }
        if($req->address == Null){
            return redirect()->route('checkout',$id)->with('erro1','Please enter your delivery address');
        }
        else{
        $thongtin = $thongtin.' - '.$req->address;
        }
        if($req->phoneNo == Null){
            $thongtin = $thongtin.' - '.$tk->dienthoai;
        }
        else{
            $thongtin = $thongtin.' - '.$req->phoneNo;
        }
        $NewHD = new hoadonban();
        $NewHD ->khachhang_id = $id;
        $NewHD -> ngaylap = Carbon::now();
        $NewHD -> tongtien = Cart::subtotal();
        $NewHD -> mota = $req->comment;
        $NewHD ->thongtinnguoinhan = $thongtin;
        $NewHD -> trangthai = 1;
        $NewHD ->save();
        foreach($content as $cthd){
            $newcthd = new cthoadonban();
            $newcthd ->hoadonban_id = $NewHD->id;
            $idsp = DB::table('sanphams')->where('tensp','=',$cthd->name)->first();
            $newcthd -> sanpham_id = $idsp->id;
            $newcthd -> soluong = $cthd ->qty;
            $newcthd -> dongia = $cthd -> price;
            $newcthd ->thanhtien = $cthd->price * $cthd->qty;
            $newcthd -> trangthai = 0;
            $newcthd->save();
        }
        Cart::destroy();
        return redirect()->route('checkout',$id)->with('erro','Order Success!');
    }
    }
    
}
