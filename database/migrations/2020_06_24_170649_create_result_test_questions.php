<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTestQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_test_questions', function (Blueprint $table) {
          $table->increments('result_id');
          $table->integer('user_id');
          $table->integer('test_id');
          $table->integer('question_id');
          $table->boolean('is_attempted');
          $table->integer('selected_option');
          $table->boolean('is_tagged');
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
        Schema::drop('result_test_questions');
    }
}
