<?php

use Illuminate\Support\Facades\Schema;
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
          $table->string('user_id');
          $table->integer('selected_option')->nullable();
          $table->string('test_id');
          $table->integer('is_tagged');
          $table->integer('question_id');
          $table->integer('is_attempted');
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
        Schema::dropIfExists('result_test_questions');
    }
}
