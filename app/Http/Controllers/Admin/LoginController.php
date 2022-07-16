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
        return view("'admin.dashboard.index'");
    }




    public function login(Request $request){
        $tk = DB::table('taikhoans')->where('email',$request->email)->get();
       // dD($tk);
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
        foreach($tk as $a){
            if($a->trangthai == 0 || $a->trangthai == -1){
                return redirect()->route('admin.login')->with('message', 'Account has been locked!');
            }
            else{
                if($a->loaitk == 0){
                    return redirect()->route('admin.login')->with('message', 'This is a user account!');
                }else{
                    if (Auth::guard('admin')->attempt(['email' =>$request->email, 'password' => $request->password],$remember)){
                        return redirect()->route('admin.dashboard');
                    }
                }
            }
        }

        return back()->withInput($request->only('email', 'remember'))->with('message', 'Wrong email or password!');
    }

        // public function login(Request $request)
        // {
        //     $remember = $request->remember;
        //     $this->validate($request, [
        //         'email' => 'required|email',
        //         'password' => 'required|min:6'
        //     ]);
        //     if (Auth::guard('admin')->attempt([
        //         'email' => $request->email,
        //         'password' => $request->password
        //     ], $request->get('remember')))
        //     {
        //         return redirect()->intended(route('thongke'));
        //     }
        //     return back()->withInput($request->only('email', 'remember'));
        // }


        // public function login(Request $request)
        // {
        //     $this->validate($request, [
        //         'email' => 'required|email',
        //         'password' => 'required|min:6'
        //     ]);
        //     $remember = $request->remember;
        //     if (Auth::guard('users')->attempt(['email' =>$request->email, 'password' => $request->password, 'trangthai'=> '1','loaitk'=> '0' ], $remember)) {
        //         return redirect()->route('home-index')->with('message', 'Logged in successfully!');
        //     }
        //     else{
        //         return redirect()->route('user-login')->with('erro', 'Account has been locked!');
        //     }
        //         return ('welcome');
        // }



        // public function login(Request $request)
        // {
        //     $this->validate($request, [
        //         'email' => 'required|email',
        //         'password' => 'required|min:6'
        //     ]);
        //     if (Auth::guard('admin')->attempt([
        //         'email' => $request->email,
        //         'password' => $request->password,
        //         'trangthai' => '1',
        //         'loaitk' => '1 or 2'
        //     ], $request->get('remember'))) {
        //         return redirect()->intended(route('admin.dashboard'));
        //     }elseif (Auth::guard('admin')->attempt([
        //         'email' => $request->email,
        //         'password' => $request->password,
        //         'trangthai' => 0
        //     ], $request->get('remember'))) {
        //         return back()->withInput($request->only('email', 'remember'))->with('message', 'Account has been locked!');
        //     }
        //         return back()->withInput($request->only('email', 'remember'))->with('message', 'Wrong email or password!');
        // }


        public function logout(Request $request)
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            Auth::logout();
            return redirect()->route('admin.login');
        }

        


}
