<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_about_us', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('education');
          $table->string('description');
          $table->integer('admin_id');
          $table->string('createdBy');
          $table->string('attachment');
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
        Schema::dropIfExists('vision_about_us');
    }
}
