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
            $remember = $request->remember;
            if (Auth::guard('web')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1','loaitk'=> '0' ], $remember)) {
                return redirect()->route('home-index')->with('message', 'Logged in successfully!');
            }
            else{
                return redirect()->route('user-login')->with('erro', 'Account has been locked!');
            }
                return ('welcome');
        }


        public function out(Request $request)
        {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            return redirect()->route('user-login');
            
        }

    
}
