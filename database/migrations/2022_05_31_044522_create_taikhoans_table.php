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
            $table->string('password');
            $table->rememberToken();
            $table->string('email');
            $table->string('dienthoai')->nullable();
            $table->string('hinhdaidien')->nullable();
            $table->string('hoten')->nullable();
            $table->string('diachi')->nullable();
            $table->integer('loaitk')->nullable()->default(0); //0 là user, 1 là nhân viên, 2 là quản lý
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
