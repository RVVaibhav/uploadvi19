<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->boolean('is_primary')->default(false);
            $table->bigInteger('otp')->unsigned();
            $table->boolean('is_bot')->default(false);;
            $table->integer('age')->nullable();
            $table->string('verification')->nullable();
            $table->string('user_bio')->nullable();
            $table->string('status')->nullable();
            $table->string('profile_pic')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_details');
    }
}
