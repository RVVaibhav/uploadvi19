<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_details', function (Blueprint $table) {
          $table->increments('result_id');
          $table->integer('user_id');
          $table->integer('test_id');
          $table->date('result_date');
          $table->time('result_time');
          $table->integer('attempted_questions');
          $table->integer('unattempted_questions');
          $table->integer('correct_questions');
          $table->integer('incorrect_questions');
          $table->integer('tagged_questions');
          $table->double('total_score');
          $table->integer('result_status');
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
        Schema::drop('result_details');
    }
}
