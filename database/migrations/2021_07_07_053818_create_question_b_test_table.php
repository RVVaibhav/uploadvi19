<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionBTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_b_test', function (Blueprint $table) {
          $table->increments('question_id');
           $table->integer('subject_group_id');
           $table->string('question_type');
           $table->text('question');
           $table->string('option_1');
           $table->string('option_2');
           $table->string('option_3');
           $table->string('option_4');
           $table->string('option_5');
           $table->integer('correct_option');
           $table->integer('questions_selection_count');
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
        Schema::dropIfExists('question_b_test');
    }
}
