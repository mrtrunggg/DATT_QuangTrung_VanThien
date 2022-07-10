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
            $table->string('mausac')->nullable();
            $table->string('kichthuoc')->nullable();
            $table->string('hinhanh')->nullable();
            $table->integer('soluong')->default(0);
            $table->integer('giaban')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->string('mota')->nullable();
            $table->integer('dongianhap')->nullable();
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
