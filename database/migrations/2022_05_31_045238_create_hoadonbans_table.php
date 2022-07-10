<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonbans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khachhang_id')->unsigned();

            $table->integer('nhanvien_id')->nullable()->unsigned();

<<<<<<< HEAD

=======
>>>>>>> 7a22768d1ca03cb9237ccc9a9e3b1a6ba126aec2
            $table->string('ngaylap');
            $table->integer('tongtien');
            $table->string('mota')->nullable();
            $table->string('thongtinnguoinhan');
            $table->integer('trangthai')->nullable()->default(1);     
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('khachhang_id')->references('id')->on('taikhoans');
            $table->foreign('nhanvien_id')->references('id')->on('taikhoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonbans');
    }
}