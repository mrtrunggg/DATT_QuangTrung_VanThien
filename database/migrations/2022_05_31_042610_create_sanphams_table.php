<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp');
            $table->string('loaisp');      
            $table->string('mausac');
            $table->string('kichthuoc');
            $table->string('hinhanh')->nullable();
            $table->integer('soluong');
            $table->integer('giaban');
            $table->integer('discount');
            $table->integer('giakhuyenmai');
            $table->string('mota');
            $table->integer('dongianhap');
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
        Schema::dropIfExists('sanphams');
    }
}
