<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\taikhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class taikhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoans')->insert([
            [
                'tendangnhap' => 'mrtrunggg',
                'matkhau' => Hash::make('mrtrung123'),
                'mail' => 'mrtrunggg123'.'@gmail.com',    
                'dienthoai' => '0918018462',
                'hinhdaidien' => 'avater1.png',
                'diachi' => 'Khu phố 2, thị xã Hắc Dịch',
                'loaitk' => '1',
                'trangthai' => '1',
                'hoten' => 'Đinh Quang Trung',
            ],
            [
                'tendangnhap' => 'mrthien',
                'matkhau' => Hash::make('mrthien123456'),
                'mail' => 'mrthien123'.'@gmail.com',    
                'dienthoai' => '123921039',
                'hinhdaidien' => 'avater2.png',
                'diachi' => 'Khu phố 45, thị xã Xài gòn',
                'loaitk' => '1',
                'trangthai' => '1',
                'hoten' => 'Đoàn Văn Thiện',
            ],
            [
                'tendangnhap' => 'mrtronggg',
                'matkhau' => Hash::make('mrtrong12561'),
                'mail' => 'mrtronggg123'.'@gmail.com',    
                'dienthoai' => '1920123123',
                'hinhdaidien' => 'avater3.png',
                'diachi' => 'Khu phố 2, thị xã Phú Mỹ',
                'loaitk' => '1',
                'trangthai' => '1',
                'hoten' => 'Đặng Quốc Trọng',
            ]
         ]
        );
    }
}
