<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaikhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tendangnhap');    
            $table->string('matkhau');
            $table->string('mail');
            $table->string('dienthoai');
            $table->string('hinhdaidien');
            $table->string('hoten');
            $table->string('diachi');
            $table->integer('loaitk')->nullable()->default(1); //0 là user, 1 là nhân viên, 2 là quản lý
            $table->integer('trangthai')->nullable()->default(1);     
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
        Schema::dropIfExists('taikhoans');
    }
}
