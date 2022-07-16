<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNhacungcapsInHoadonnhaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadonnhaps', function (Blueprint $table) {
            $table->foreign('tennhacungcap_id')
            ->references('id')->on('nhacungcaps')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadonnhaps', function (Blueprint $table) {
            //
        });
    }
}
