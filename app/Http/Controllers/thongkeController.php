<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\hoadonban;
use App\Models\sanpham;
use App\Models\cthoadonban;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Session;
use Illuminate\Mail\Message;
use Cart;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class thongkeController extends Controller
{
    public function index(){

        $thongke = hoadonban::select(DB::raw("sum(tongtien) as count"))
        ->whereYear('updated_at', date('Y'))
        ->where('trangthai','2')
        ->groupBy(DB::raw("Month(updated_at)"))
        ->pluck('count');
       // dd($tonkhone);
       $tongdoanhthu = DB::table('hoadonbans')
       ->where('trangthai','=','2')
       ->get();

   $tongsanphamkk = DB::table('chitietsanphams')->where('trangthai','=','1')->get();
   $tongtienmuahang = DB::table('hoadonnhaps')
   ->select(DB::raw("sum(tongtien) as tongtien"))
   ->where('trangthai','=','2')
   ->groupBy('trangthai')
   ->get();
       $thongtienne = 0;
       $tonkhone = 0;
       //dd($tongdoanhthu);
       foreach($tongdoanhthu as $tongtien){
           $thongtienne += $tongtien->tongtien;
       }

       foreach($tongsanphamkk as $tongsp){
           $tonkhone += $tongsp->soluong;
       }

   $monththongke = hoadonban::select(DB::raw("Month(updated_at) as month"))
       ->whereYear('updated_at', date('Y'))
       ->where('trangthai','2')
       ->groupBy(DB::raw("Month(updated_at)"))
       ->pluck('month');     

   $data = [0,0,0,0,0,0,0,0,0,0,0,0];
       //dd($monththongke);

    foreach ($monththongke as $index => $month){
    $index;
    $data[--$month] = $thongke[$index];
    }
    return view('admin.quanlyadmin.thongke.index',compact('tonkhone','thongtienne','tongtienmuahang'), ['cuccung' =>$data]);
    }
    public function tksanpham(){
        $check = 0;
        $thongke = DB::table('sanphams')
        ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.updated_at','cthoadonbans.kichco')
        ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')->where('cthoadonbans.trangthai','=','2')
        ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
        //dd($thongke);
        return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);
    }
    public function sptimkiemsp(Request $req){
        $thongke = DB::table('sanphams')
        ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.updated_at','cthoadonbans.kichco')
        ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
        ->where('tensp','like','%'.$req->a.'%')
        ->where('cthoadonbans.trangthai','=','2')
        ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
        //dd($thongke);
        return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);
    }
    public function sapxeptheodanhmuc(Request $req){
        $check = "";
        if($req->searchloaisp == 0){
            $check = "soluong";
        }else if ($req->searchloaisp == 1){
            $check = "thanhtien";
        }
        $thongke = DB::table('sanphams')
        ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.updated_at','cthoadonbans.kichco')
        ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
        ->where('cthoadonbans.trangthai','=','2')
        ->orderBy($check,'DESC')
        ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
        //dd($thongke);
        return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);
    }
    public function danhsachsptheongay(Request $req){
        $check ="";
        if ($req->denngay == "2022-06-30" && $req->layngay == "2022-06-30"){
            $thongke = DB::table('sanphams')
            ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.kichco','cthoadonbans.updated_at')
            ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')->where('cthoadonbans.trangthai','=','2')
            ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
            //dd($thongke);
            return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);
     
        }
        elseif($req->layngay == "2022-06-30" ){
            $check = $req->denngay;

        } else if ($req->denngay == "2022-06-30"){
            $check= $req->layngay;
        }

        if($check == ""){
            $thongke = DB::table('sanphams')
            ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.updated_at')
            ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
            ->where('cthoadonbans.updated_at','>=',$req->layngay)
            ->where('cthoadonbans.updated_at','<=',$req->denngay)
            ->where('cthoadonbans.trangthai','=','2')
            ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
            //dd($thongke);
            return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);       
        }else{
            $thongke = DB::table('sanphams')
            ->select('hinhanh','tensp',DB::raw("sum(thanhtien) as thanhtien"),DB::raw("sum(cthoadonbans.soluong) as soluong"),'cthoadonbans.updated_at')
            ->join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
            ->where('cthoadonbans.updated_at','like','%'.$check.'%')
            ->where('cthoadonbans.trangthai','=','2')
            ->groupBy('tensp','hinhanh','cthoadonbans.updated_at','cthoadonbans.kichco')->paginate(10);
            //dd($thongke);
            return view('admin.quanlyadmin.thongke.thongke',compact('thongke'))->with('i', (request()->input('page', 1) -1) *10);
        }

 
    }
    public function byDate(Request $req){
//         $data = $req->all();
//         $Ngaybatdau = $data['Ngaybatdau'];
//         $Ngayketthuc = $data['Ngayketthuc'];
//         $get = DB::table('thongke')->where('ngayDat','>=',$Ngaybatdau)->where('ngayDat','<=',$Ngayketthuc)->orderBy('ngayDat','ASC')->get();
//         foreach($get as $a){
//             $chart_data = array(
//                 'period' => $a->ngayDat,
//                 'order' => $a->soDonDatHang,
//                 'sales' => $a->doanhSo,
//                 'profix' => $a->loinhuan,
//                 'quantity' =>$a->soluong,
//             );
//         }
// ;
//         echo $data = json_encode($chart_data);
       // return response()->json(['data'=>$chart_data] ,200);

    }
}
