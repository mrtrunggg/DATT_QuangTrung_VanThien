<?php

namespace App\Http\Controllers\Admin;

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



class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }




    // public function login(Request $request){
    //     $tk = taikhoan::where('email',$request->email)->first();
    //     $validator = Validator::make($request->all(),[
    //         'email'=>'required|email',
    //         'password'=>'required',
    //     ]);
    //     if($validator->fails()) {
    //         return redirect() -> back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    //     $remember = $request->remember;
    //     if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '0' ], $remember)) {
    //         return redirect()->route('auth.show')->with('message', 'Tài khoản đã bị khóa');
    //     }
    //     if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '0'], $remember)) {
    //         return redirect()->route('home',$tk->id);
    //     }
    //     if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '1' ], $remember)) {
    //         return redirect()->route('admin.index');
    //     }
    //     if (Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '2' ], $remember)) {
    //         return view('admin.index');
    //     }
    // }

        public function login(Request $request)
        {
            $remember = $request->remember;
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember')))
            {
                return redirect()->intended(route('admin.dashboard'));
            }

            if(Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '1' ], $remember ))
            {
                return view('admin.index');
            }

            if(Auth::guard('taikhoan')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1', 'loaitk'=> '2
            ' ], $remember ))
            {
                return view('admin.index');
            }



            return back()->withInput($request->only('email', 'remember'));
        }

        public function logout(Request $request)
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            return redirect()->route('admin.login');
        }


}
