<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('result_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('quiz_id')->unsigned();
            $table->string('total_mark')->nullable();
            $table->string('yes_ans')->nullable();
            $table->string('no_ans')->nullable();
            $table->longText('result_json')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();

            $table->foreign('quiz_id')->references('quiz_id')->on('quizzes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
