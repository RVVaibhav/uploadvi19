<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_solutions', function (Blueprint $table) {
          $table->increments('solution_id');
           $table->integer('report_id');
           $table->string('solution');
           $table->string('reference');
           $table->string('createdBy');
            $table->string('adminId');
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
        Schema::dropIfExists('report_solutions');
    }
}
