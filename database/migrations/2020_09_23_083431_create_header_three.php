<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderThree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_header_3', function (Blueprint $table) {
          $table->increments('test_header_3_id');
          $table->integer('test_header_1_id')->unsigned();
          $table->integer('test_header_2_id')->unsigned();
          $table->string('test_header_3');
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
        Schema::dropIfExists('test_header_3');
    }
}
