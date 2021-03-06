<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use App\Models\cthoadonnhap;
use App\Models\hoadonnhap;
use App\Models\sanpham;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\taikhoan;
use DateTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class nhapkhoController extends Controller
{
    function view($id){       
        $data=1;
        $dshoadonban3 = DB::table('hoadonnhaps')->where('trangthai','!=','0')
                                            ->where('id','=',$id)->get();
        $dscthoadonban = DB::table('cthoadonnhaps')->where('hoadonnhap_id','=',$id)->get();

       
        $tenkh= DB::table('taikhoans')->where('trangthai','!=','0')->get();
        $tensp= DB::table('sanphams')->where('trangthai','!=','0')->get();
        $tensize= DB::table('chitietsanphams')->where('trangthai','!=','0')->get();
        return view('admin.quanlyadmin.hoadonnhap.view',compact('dshoadonban3','dscthoadonban','tenkh','tensp','tensize'), ['cuccung' => $data]);
    }

    function index()
    {
        $data=1;
        $dshoadonnhap = DB::table('hoadonnhaps')->where('trangthai','!=','0')->paginate(5); 
        $tenkh= DB::table('taikhoans')->where('trangthai','!=','0')->get();  
        return view('admin.quanlyadmin.hoadonnhap.index',compact('dshoadonnhap','tenkh'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *5);;
    }

    function timkiem(Request $req)
    {

        $data=1;
        $dshoadonnhap = DB::table('hoadonnhaps')->where('trangthai','!=','0')->where('trangthai','=',$req->search)->paginate(10);   
        return view('admin.quanlyadmin.hoadonnhap.index',compact('dshoadonnhap'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);;
    }

    function timkiemtheongayHDN(Request $req)
    {
        $data=1;
        $dshoadonnhap = DB::table('hoadonnhaps')->where('trangthai','!=','0')->where('ngaylap','like','%'.$req->layngay.'%')->paginate(10);   
        return view('admin.quanlyadmin.hoadonnhap.index',compact('dshoadonnhap'),  ['cuccung' => $data])->with('i', (request()->input('page', 1) -1) *10);;
    }

    function create()
    {
        
        $data=1;
        $dstaikhoanlaphd = DB::table('taikhoans')->where('trangthai','=','1')
                                                ->where('loaitk','=','1')
                                                ->get();
        $dssplaphd = DB::table('sanphams')
        ->where('trangthai','=','1')
        ->get();
        return view('admin.quanlyadmin.hoadonnhap.create',compact('dstaikhoanlaphd','dssplaphd'), ['cuccung' => $data]);
    }

    function create2()
    {
        $data=1;
        return view('admin.quanlyadmin.hoadonnhap.create2', ['cuccung' => $data]);
    }



    function timidsp($id)
    {
        
        $Tk = sanpham::find($id);
        
        $ctsp = DB::table('chitietsanphams')
        ->where('sanpham_id', '=', $id)
        ->where('trangthai', '!=' ,'0')
        ->get();
        return response()->json($ctsp);
    }


    function xulydelete($id){ 
        $Tk = hoadonnhap::find($id);
        $Tk -> trangthai = 0;
        $Tk -> save();

        $tk3 = DB::table('cthoadonnhaps')
            ->where('hoadonnhap_id', '=', $id)
            ->update(['trangthai' => 0]);
        return response()->json($Tk,$tk3);
    }

    


    function xulycreate(Request $req){
        
        // $student=hoadonnhap::create($req->all());
        // return response()->json(['data'=>$student,'name'=>'B??nh'],200); // 200 l?? m?? l???i
      
        $TK = new hoadonnhap();
        $TK->tennhacungcap_id = $req->tennhacungcap;
        $TK->taikhoan_id = $req -> taikhoan_id;
        $TK->mota = $req->mota;
        $TK->ngaylap = Carbon::now();
        $TK -> save();
        $idne = $TK -> id;
        return response()->json([
            'idcthd'=>$idne,
            'data'=>$TK,
            'message'=>'T???o sinh vi??n th??nh c??ng'
        ],200); // 200 l?? m?? l???i

    }
    
    function xulycreatectsp(Request $req){
        
        $TK = new cthoadonnhap();
        $TK->hoadonnhap_id = $req->hoadonnhap_id;
        $TK->ctsanpham_id = $req->ctsanpham_id;
        $TK->sanpham_id = $req -> sanpham_id;
        $TK->soluong = $req->soluong;
        $TK->thanhtien = $req->thanhtien;
        $TK->dongianhap = $req->dongianhap;
      
        $TK->trangthai = 1;
        $TK -> save();

        $hoadonnhapne = DB::table('hoadonnhaps')->find($req->hoadonnhap_id);
        $tongtienupdate = $hoadonnhapne -> tongtien + $TK->thanhtien;


        hoadonnhap::where('id', $req->hoadonnhap_id)
            ->update(['tongtien' =>  $tongtienupdate]);


        return response()->json([
            'tongtien'=>$tongtienupdate,
            'data'=>$TK,
        ],200); // 200 l?? m?? l???i

    }

    function showctsp($id){       
        $data=1;
        $dscthoadonnhapne = DB::table('cthoadonnhaps')
            ->where('hoadonnhap_id', '=', $id)
            ->where('trangthai', '!=', '0')
            ->get(); 
        $tongtien = DB::table('hoadonnhaps')
            ->where('id', '=', $id)
            ->where('trangthai', '!=', '0')
            ->get();              
        return response()->json(['data'=>$dscthoadonnhapne,'tongtienhihi'=>$tongtien] ,200);                     
        // return view('admin.quanlyadmin.hoadonnhap.view',compact('dshoadonnhapne'), ['cuccung' => $data]);
    }

    public function destroy($id)
    {
        cthoadonnhap::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }

    function editTTHdb(Request $req){  

        $HDB = hoadonnhap::find($req->id);
        $HDB->trangthai = $req->trangthai;
        $HDB -> update();
        
        $x = DB::table('cthoadonnhaps')->where('hoadonnhap_id','=',$HDB->id)->get(); 
        foreach($x as $b){
               
            $cthdb = cthoadonnhap::find($b->id);
            $cthdb -> trangthai = $req->trangthai;
            $cthdb -> update();
            
            $sp = chitietsanpham::find($b->ctsanpham_id);
            $sp->soluong = $sp->soluong + $b->soluong;
            $sp -> update();
        }
      
        // @dd($HDB);
        return response()->json($HDB);
    } 

    // $Tk = sanpham::find($id);
    //     return response()->json($Tk);


}
   