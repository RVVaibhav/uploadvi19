<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletPointsRequired extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_points_required', function (Blueprint $table) {
          $table->increments('result_id');
          $table->string('item_name');
          $table->integer('item_id');
          $table->integer('required_points');
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
        Schema::drop('wallet_points_required');
    }
}
