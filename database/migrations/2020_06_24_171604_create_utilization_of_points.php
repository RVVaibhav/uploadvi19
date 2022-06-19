<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilizationOfPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilization_of_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('item_name');
            $table->integer('item_id');
            $table->integer('used_points');
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
        Schema::drop('utilization_of_points');
    }
}
