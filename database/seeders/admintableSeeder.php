<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
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
        Admin::create([
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        ]);
    }
}
