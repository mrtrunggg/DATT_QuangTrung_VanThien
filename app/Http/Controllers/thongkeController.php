<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\taikhoan;
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

    $monththongke = hoadonban::select(DB::raw("Month(updated_at) as month"))
        ->whereYear('updated_at', date('Y'))
        ->where('trangthai','2')
        ->groupBy(DB::raw("Month(updated_at)"))
        ->pluck('month');     

    $data = [0,0,0,0,0,0,0,0,0,0,0,0];
    $line = [0,0,0,0,0,0,0,0,0,0,0,0];
          //dd($monththongke);

    foreach ($monththongke as $index => $month){
        $doanhthuban = 0;
        $tiennhap = sanpham::join('cthoadonbans','sanphams.id','=','cthoadonbans.sanpham_id')
        ->select('cthoadonbans.sanpham_id','cthoadonbans.soluong','sanphams.giaban','sanphams.dongianhap','cthoadonbans.trangthai',(DB::raw("Month(cthoadonbans.updated_at) as month")))
        ->whereYear('cthoadonbans.updated_at', date('Y'))
        ->where('cthoadonbans.trangthai','=','2')
        ->where(DB::raw("Month(cthoadonbans.updated_at)"),'=', $month)
        ->get();


        foreach ($tiennhap as $tinhtien){
            $doanhthuban = $doanhthuban + (($tinhtien->soluong * $tinhtien->giaban) - ($tinhtien->soluong  * $tinhtien->dongianhap));
        }
    $index;
    $line[--$month] = $doanhthuban;
    $data[$month] = $thongke[$index];
    }
    return view('admin.quanlyadmin.thongke.index', ['cuccung' =>$data,'line'=>$line]);
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
