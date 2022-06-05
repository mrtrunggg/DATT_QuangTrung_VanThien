<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\taikhoan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
class taikhoanController extends Controller
{
    public function show(){
        return view('auth.add');
    }
    public function store(Request $request){

        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'tendangnhap'=>'required|min:6|max:30',
                'email'=>'required|email',
                'password'=>'required|confirmed|min:6|max:20',
            ]);

            if($validator->fails()) {
                return redirect() -> back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $taikhoan = DB::table('taikhoans')->where('email', $request->email)->first();
            if(!$taikhoan){
                $newtaikhoan = new taikhoan();
                $newtaikhoan->tendangnhap = $request -> tendangnhap;
                $newtaikhoan->email = $request -> email;
                $newtaikhoan->password = bcrypt($request -> password);
                $newtaikhoan -> save();
                return redirect()->route('auth.show')->with('message', 'Bạn đã tạo tài khoản thành công');

            }else{
                return redirect()->route('auth.login')->with('message', 'Bạn đã tạo tài khoản thất bại');
            }
        }
    }

    public function loginShow(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if($validator->fails()) {
            return redirect() -> back()
                ->withErrors($validator)
                ->withInput();
        }
        $remember = $request->remember;

        if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '0' ], $remember)) {
            return redirect()->route('auth.show')->with('message', 'Tài khoản đã bị khóa');
        }
        if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '0'], $remember)) {
            return view('home');
        }
        if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '1' ], $remember)) {
            return view('admin');
        }
        if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '2' ], $remember)) {
            return view('admin');
        }
    }
}
