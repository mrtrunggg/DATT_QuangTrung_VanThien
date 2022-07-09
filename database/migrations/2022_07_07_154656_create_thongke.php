<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongke extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongke', function (Blueprint $table) {
            $table->id();
            $table->datetime('ngayDat');
            $table->double('doanhSo');
            $table->double('loinhuan');
            $table->double('soluong');
            $table->double('soDonDatHang');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thongke');
    }
}
