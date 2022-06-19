<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderFour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_header_4', function (Blueprint $table) {
            $table->increments('test_header_4_id');
            $table->integer('test_header_3_id');
            $table->integer('test_header_1_id');
            $table->integer('test_header_2_id');
            $table->string('test_header_4');
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
        Schema::drop('test_header_4');
    }
}
