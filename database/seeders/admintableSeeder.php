<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\taikhoan;
use Faker\Factory as Faker;

class admintableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        taikhoan::create([
        'tendangnhap' => 'Quang trung',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'loaitk' => '1',
        ]);
    }
}
