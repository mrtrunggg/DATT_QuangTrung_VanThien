<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthoadonnhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthoadonnhaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hoadonnhap_id')->unsigned();
            $table->integer('sanpham_id')->unsigned();
            $table->integer('soluong');
            $table->integer('thanhtien');
            $table->integer('trangthai')->nullable()->default(1);     
            $table->timestamps();     
            $table->softDeletes();  
            $table->foreign('hoadonnhap_id')->references('id')->on('hoadonnhaps');
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
        Schema::dropIfExists('cthoadonnhaps');
    }
}
