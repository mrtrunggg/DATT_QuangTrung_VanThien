<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietsanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietsanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->string('kichthuoc')->nullable();
            $table->integer('soluong')->default(0);
            $table->integer('giaban')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->integer('trangthai')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('chitietsanphams');
    }
}
