<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\taikhoan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class qltaikhoanController extends Controller
{
    function index()
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('loaitk',"=",'1')->where('trangthai',"!=",'-1')->paginate(8);   
        return view('admin.quanlyadmin.taikhoan.index',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *8);
    }

    function indexuser()
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('loaitk',"=",'0')->where('trangthai',"!=",'-1')->paginate(8);   
        return view('admin.quanlyadmin.taikhoan.user',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *8);
    }

    function timkiem(Request $req)
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('tendangnhap','like','%'.$req->search.'%')->where('loaitk',"=",'1')->where('trangthai',"!=",'-1')->paginate(10);   
        return view('admin.quanlyadmin.taikhoan.index',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }
    function timkiemloaisp(Request $req)
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','like','%'.$req->search23.'%')->where('loaitk',"=",'1')->where('trangthai',"!=",'-1')->paginate(10);;   
        return view('admin.quanlyadmin.taikhoan.index',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }


    function timkiemuser(Request $req)
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('tendangnhap','like','%'.$req->search.'%')->where('loaitk',"=",'0')->where('trangthai',"!=",'-1')->paginate(10);   
        return view('admin.quanlyadmin.taikhoan.user',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }
    function timkiemloaispuser(Request $req)
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','like','%'.$req->search23.'%')->where('loaitk',"=",'0')->where('trangthai',"!=",'-1')->paginate(10);;   
        return view('admin.quanlyadmin.taikhoan.user',compact('dstaikhoan'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);
    }





    function create()
    {
        $data=1;
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','=','1')->get();
        return view('admin.quanlyadmin.taikhoan.create',compact('dstaikhoan'), ['cuccung' => $data]);
    }

    function xulycreate(Request $req){
        if($req->has('hinhdaidien')){
            $file = $req->hinhdaidien;
            $ext = $req->hinhdaidien->extension();
            $file_name = time().'-'.'account'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } 
        if($req->hinhdaidien == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $TK = new taikhoan();
        $TK->tendangnhap = $req->tendangnhap;
        $TK->password = bcrypt($req -> password);
        $TK->email = $req->email;
        $TK->dienthoai = $req->dienthoai;
        $TK->hinhdaidien = $req->image;
        $TK->hoten = $req->hoten;
        $TK->diachi = $req->diachi;
        $TK->loaitk = $req->loaitk;
        $TK->trangthai = $req->trangthai;
        $TK -> save();
        $dstaikhoan = taikhoan::all();
      
       return redirect()->route('indexTk',compact('dstaikhoan'));
    }

 
    function edit($id)
    {
        $data=1;
        $thongtin = taikhoan::find($id);
        return view('admin.quanlyadmin.taikhoan.edit',compact('thongtin'), ['cuccung' => $data]);
    }
    
    function xulyedit(Request $req, $id){  

        if($req->has('hinhdaidien')){
            $file = $req->hinhdaidien;
            $ext = $req->hinhdaidien->extension();
            $file_name = time().'-'.'account'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } 
        if($req->hinhdaidien == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $Tk = taikhoan::find($id);
        $Tk->tendangnhap = $req->tendangnhap;
        $Tk->password = bcrypt($req -> password);
        $Tk->email = $req->email;
        $Tk->dienthoai = $req->dienthoai;
        $Tk->hinhdaidien = $req->image;
        $Tk->hoten = $req->hoten;
        $Tk->diachi = $req->diachi;
        $Tk->loaitk = $req->loaitk;
        $Tk->trangthai = $req->trangthai;
        $Tk -> save();    
        $dstaikhoan = taikhoan::all();
       return redirect()->route('indexTk',compact('dstaikhoan'));
    }


    function editTTTK(Request $req){       
        $HDB = taikhoan::find($req->id);
        $HDB->trangthai = $req->trangthai;
        $HDB -> update();
    
        // @dd($HDB);
        return response()->json($HDB);
    } 
    
    function xulydelete($id){       
        $Tk = taikhoan::find($id);
        $Tk -> trangthai = -1;
        $Tk -> save();
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','!=','-1')->where('loaitk','=','1')->get();    
        return redirect()->route('indexTk',compact('dstaikhoan'));
    } 
    function xulydeleteuser($id){       
        $Tk = taikhoan::find($id);
        $Tk -> trangthai = -1;
        $Tk -> save();
        $dstaikhoan = DB::table('taikhoans')->where('trangthai','!=','-1')->where('loaitk','=','0')->get();    
        return redirect()->route('indexTkuser',compact('dstaikhoan'));
    } 

    function information(){
        $data=1;
    
        return view('admin.quanlyadmin.taikhoan.information',  ['cuccung' => $data]);
    
    }
    
    function changeinformation(){
        $data=1;
    
        return view('admin.quanlyadmin.taikhoan.changeinformation',  ['cuccung' => $data]);
    
    }



    function xulyeditthongtin(Request $req){  

        if($req->has('hinhdaidien')){
            $file = $req->hinhdaidien;
            $ext = $req->hinhdaidien->extension();
            $file_name = time().'-'.'account'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } 
        if($req->hinhdaidien == Null){
            $file_name = Null;
        }
        $req->merge(['image'=>$file_name]);
        $Tk = taikhoan::find(auth()->guard('admin')->user()->id);
        $Tk->tendangnhap = $req->tendangnhap;
        $Tk->email = $req->email;
        $Tk->dienthoai = $req->dienthoai;
        $Tk->hinhdaidien = $req->image;
        $Tk->hoten = $req->hoten;
        $Tk->diachi = $req->diachi;
        $Tk->loaitk = $req->loaitk;
        $Tk -> save();    
        $dstaikhoan = taikhoan::all();
       return view('admin.quanlyadmin.taikhoan.information');
    }


    
    function changepassword(){
        $data=1;
        return view('admin.quanlyadmin.taikhoan.changepassw',  ['cuccung' => $data]);
    
    }

    public function postrchangepasssword(Request $req){
        $user = DB::table('taikhoans')->find(auth()->guard('admin')->user()->id);
        if($req->oldpass == Null){
            return redirect()->route('changepassw')->with('notice1','Please enter old password!');
        }
        elseif($req->newpass == Null)
        {
            return redirect()->route('changepassw')->with('notice1','Please enter a new password!');
        }
        elseif($req->renewpass == Null){
            return redirect()->route('changepassw')->with('notice1','Please re-enter new password!');
        }
        elseif($req->newpass != $req->renewpass){
            return redirect()->route('changepassw')->with('notice1','Please re-enter the correct new password!');
        }
        elseif(!(Hash::check($req->get('oldpass'),$user->password)))
        {
            return redirect()->route('changepassw')->with('notice1','The old password is incorrect, please re-enter!');
        }
        else{
            $pass = DB::table('taikhoans')->where('id',auth()->guard('admin')->user()->id)->update(['password'=>bcrypt($req->newpass)]);
            return redirect()->route('information')->with('notice','Password change successful!');

        }
    }
    

    function changepasswordadmin($id)
    {
        $data=1;
        $thongtin = taikhoan::find($id);
        return view('admin.quanlyadmin.taikhoan.changepasswordadmin',compact('thongtin'), ['cuccung' => $data]);
    }


    public function postchangepasswordadmin(Request $req, $id){
        $user = DB::table('taikhoans')->find($id);

        if($req->oldpass == Null){
            return redirect()->route('changepassadin',['TK'=>$id])->with('notice1','Please enter old password!');
        }
        elseif($req->newpass == Null)
        {
            return redirect()->route('changepassadin',['TK'=>$id])->with('notice1','Please enter a new password!');
        }
        elseif($req->renewpass == Null){
            return redirect()->route('changepassadin',['TK'=>$id])->with('notice1','Please re-enter new password!');
        }
        elseif($req->newpass != $req->renewpass){
            return redirect()->route('changepassadin',['TK'=>$id])->with('notice1','Please re-enter the correct new password!');
        }
        elseif(!(Hash::check($req->get('oldpass'),$user->password)))
        {
            return redirect()->route('changepassadin',['TK'=>$id])->with('notice1','The old password is incorrect, please re-enter!');
        }
        else{
            $pass = DB::table('taikhoans')->where('id',$id)->update(['password'=>bcrypt($req->newpass)]);
            return redirect()->route('indexTk')->with('notice','Password change successful!');

        }
    }


}
