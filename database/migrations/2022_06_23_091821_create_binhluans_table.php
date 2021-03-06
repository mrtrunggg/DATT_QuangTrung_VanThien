<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('taikhoan_id')->unsigned()->nullable();
            $table->integer('sanpham_id')->unsigned();
            $table->string('mota');
            $table->string('traloibinhluan_id')->nullable();
            $table->datetime('ngaybl');
            $table->integer('trangthai')->nullable()->default(1);
            $table->foreign('taikhoan_id')->references('id')->on('taikhoans');
            $table->foreign('sanpham_id')->references('id')->on('sanphams');
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
        Schema::dropIfExists('binhluans');
    }
}