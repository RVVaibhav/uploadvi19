<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingNotesUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_purchase_notes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('user_name');
          $table->string('user_email');
          $table->string('user_address');
          $table->string('user_mobile');
          $table->string('ug_college');
          $table->string('city');
          $table->string('state');
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
        Schema::dropIfExists('user_purchase_notes');
    }
}
