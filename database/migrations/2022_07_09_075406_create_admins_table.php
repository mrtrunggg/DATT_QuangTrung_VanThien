<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name')->nullable();   
            $table->string('avatar')->nullable();    
            $table->string('birth')->nullable();
            $table->text('address')->nullable();
            $table->integer('phone_number')->nullable();
            $table->integer('status')->default(0);
            $table->integer('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->default(Null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
