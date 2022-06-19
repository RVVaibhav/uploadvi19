<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotivationQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivational_quotes', function (Blueprint $table) {
           $table->increments('motivation_id');
           $table->string('date');
           $table->string('special_day');
           $table->string('special_image');
           $table->string('motivation_txt');
           $table->string('motivation_image');
           $table->integer('admin_id');
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
        Schema::dropIfExists('motivational_quotes');
    }
}
