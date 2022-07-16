<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonnhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonnhaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tennhacungcap_id')->unsigned();
            $table->integer('taikhoan_id')->unsigned();
            $table->datetime('ngaylap');
            $table->integer('tongtien')->nullable();;
            $table->string('mota')->nullable();;
            $table->integer('trangthai')->nullable()->default(1);     
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('taikhoan_id')->references('id')->on('taikhoans');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonnhaps');
    }
}
