<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->integer('position');
            $table->string('reachto');
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
        Schema::dropIfExists('slideusers');
    }
}
