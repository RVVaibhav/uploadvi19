<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_tutorials', function (Blueprint $table) {
          $table->increments('id');
      $table->date('start_date');
      $table->date('expire_date');
      $table->string('title');
      $table->string('video');
      $table->string('headers_one');
      $table->string('headers_two');
      $table->string('headers_three');
      $table->string('headers_four');
      $table->string('thumbimage');
      $table->string('admin_id');
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
        Schema::dropIfExists('video_tutorials');
    }
}
