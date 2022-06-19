<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_report_table', function (Blueprint $table) {
          $table->increments('report_id');
          $table->string('user_id');
          $table->integer('test_id');
          $table->integer('adminId');
          $table->integer('questionId');
          $table->string('question_Comment');
          $table->string('reference');
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
        Schema::dropIfExists('question_report_table');
    }
}
