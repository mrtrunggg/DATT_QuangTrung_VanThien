<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChitietsanphamsInCthoadonnhaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cthoadonnhaps', function (Blueprint $table) {
            $table->foreign('ctsanpham_id')
            ->references('id')->on('chitietsanphams')
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
        Schema::table('cthoadonnhaps', function (Blueprint $table) {
            //
        });
    }
}
