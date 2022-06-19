<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_mobiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile',20);
            $table->integer('verif_code');
            $table->enum('status', ['verified', 'newuser'])->default('newuser');
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
        Schema::dropIfExists('verify_mobiles');
    }
}
