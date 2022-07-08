<?php

namespace App\Http\Controllers;

use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(){

        $thongke = taikhoan::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        $monththongke = taikhoan::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($monththongke as $index => $month){
            $index;
            $data[--$month] = $thongke[$index];
        }
        return view('admin.index', ['cuccung' => $data]);
    }
}