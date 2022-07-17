<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthoadonbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthoadonbans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hoadonban_id')->unsigned();
            $table->integer('sanpham_id')->unsigned();
            $table->string('kichco');
            $table->integer('soluong');
            $table->integer('dongia');
            $table->integer('thanhtien');
            $table->integer('trangthai')->nullable()->default(1);     
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('hoadonban_id')->references('id')->on('hoadonbans');
            $table->foreign('sanpham_id')->references('id')->on('sanphams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cthoadonbans');
    }
}
