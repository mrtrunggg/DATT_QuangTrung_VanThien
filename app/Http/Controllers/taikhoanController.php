<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\taikhoan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Mail\Message;
use Hash;
use Cart;
use Illuminate\Mail\Mailable;
class taikhoanController extends Controller
{
    public function show(){
        return view('auth.add');
    }
    public function loginShow(){
        return view('auth.login');
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
                return redirect()->route('user-login')->with('erro', 'You have successfully created an account');

            }else{
                return redirect()->route('user-login')->with('erro', 'You have failed to create an account');
            }
        }
    }

    public function login(Request $request){
        Cart::destroy();
        $tk = taikhoan::where('email',$request->email)->first();
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
        if (Auth::guard('taikhoans')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '0' ], $remember)) {
            return redirect()->route('auth.show')->with('message', 'Account has been locked');
        }
        elseif (Auth::guard('taikhoans')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '0'], $remember)) {
            return redirect()->route('home',$tk->id);
        }
        elseif (Auth::guard('taikhoans')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '1' ], $remember)) {
            return redirect()->route('thongke');
        }
        elseif (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '2' ], $remember)) {
            return view('thongke');
        }else{
            return redirect()->route('user-login')->with('message', 'Wrong account or password');
        }
    }

    //email

    // Qu??n m???t kh???u
    public function forgetPass(){
        return view('auth.forgetPass');
    }
    public function postForgetPass(Request $reg){
        $reg->validate([
            'email'=>'required|exists:taikhoans'],
            [
                'email.required'=>'Vui l??ng nh???p ?????a ch??? email h???p l???',
                'email.exists'=>'Email kh??ng t???n t???i',
            ]);
           
        $id = taikhoan::where('email',$reg->email)->first();
        $token = strtoupper(Str::random(10));
        $id->remember_token = $token;

        $id->save();

        Mail::send('emails.check_email_forget',compact('id'), function($email) use($id){
             $email->subject("MyShopping - Password retrieval");
             $email->to($id->email, $id->tendangnhap);
           
        });
        return redirect()->back()->with("message","Please check your email to change your password");


    }
             //?????t l???i m???t kh???u

    public function getPass(taikhoan $id, $token){
       // dd($id);
        if($id->remember_token == $token)
           return view('getPass',compact('id','token'));
    }
    public function postGetPass(taikhoan $id, $token, Request $reg){
        $reg->validate([
            'password'=>'required',
            'password_confirmation'=>'required|same:password']);
        
        $pass = bcrypt($reg->password);
        $id->remember_token = $token;
        $id->password = $pass;
        $id->save();
        return redirect()->route('user-login')->with('message','Change password successfully');
    }
}
