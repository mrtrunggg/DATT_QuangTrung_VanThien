<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Mail\Message;
use Hash;
use Illuminate\Mail\Mailable;



class UserController extends Controller
{
    use AuthenticatesUsers;
    
    // protected $redirectTo = '/user';

    public function __construct()
    {
        $this->middleware('guest')->except('out');
    }

    public function showLoginForm()
    {
        return view('userAccount.Login');
    }

    public function index()
    {
        return view("'shop.index'");
    }

        public function login(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            $tk = DB::table('taikhoans')->where('email',$request->email)->get();
            $remember = $request->remember;
            foreach($tk as $a){
                if($a->trangthai == 0 || $a->trangthai == -1){
                    return redirect()->route('user-login')->with('erro', 'Account has been locked!');
                }
                else{
                    if($a->loaitk != 0){
                        return redirect()->route('user-login')->with('erro', 'Please use customer account!');
                    }
                    else{
                        if(Auth::guard('web')->attempt(['email' =>$request->email, 'password' => $request->password],$remember)){
                            return redirect()->route('home-index')->with('message', 'Logged in successfully!');                            
                        }
                    }
                }
            }
            return redirect()->route('user-login')->with('erro', 'Login information is incorrect!');
        }


        public function out(Request $request)
        {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            return redirect()->route('user-login');
            
        }

    
}
