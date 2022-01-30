<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->integer('quiz_id')->unsigned();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('status')->nullable();
            $table->string('options')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();

            $table->foreign('quiz_id')->references('quiz_id')->on('quizzes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
