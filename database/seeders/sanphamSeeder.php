<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;
class sanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanphams')->insert([
            [
                'tensp' => 'Áo gió',
                'loaisp' => 'Áo khoác',
                'mausac' => 'Đỏ',
                'kichthuoc' => 'XL',
                'hinhanh' => 'aokhoac.png',
                'soluong' => 20,
                'giaban' => 20000,
                'discount' => 5,
                'giakhuyenmai' => 15000,
                'mota' => 'Áo khoác màu đỏ nè hehihihihihihihihihi',
                'trangthai' => 1,
            ],
            [
                'tensp' => 'Áo gió 2',
                'loaisp' => 'Áo khoác',
                'mausac' => 'Xanh',
                'kichthuoc' => 'XXL',
                'hinhanh' => 'aokhoac2.png',
                'soluong' => 20,
                'giaban' => 20000,
                'discount' => 5,
                'giakhuyenmai' => 15000,
                'mota' => 'Áo khoác màu đỏ nè hehihihihihihihihihi',
                'trangthai' => 1,
            ],
            [
                'tensp' => 'Áo gió 3',
                'loaisp' => 'Áo khoác',
                'mausac' => 'Xanh Lam',
                'kichthuoc' => 'X',
                'hinhanh' => 'aokhoac3.png',
                'soluong' => 20,
                'giaban' => 30000,
                'discount' => 5,
                'giakhuyenmai' => 25000,
                'mota' => 'Áo khoác màu đỏ nè hehihihihihihihihihi',
                'trangthai' => 1,
            ],
            ]
        );
        
    }
}
