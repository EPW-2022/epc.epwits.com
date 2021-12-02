<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_tryouts', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->default(0);
            $table->enum('category', ['Easy', 'Medium', 'Advanced'])->default('Easy');
            $table->integer('score')->default(0);
            $table->longText('question');
            $table->enum('true_answer', ['A', 'B', 'C', 'D', 'E'])->nullable();
            $table->longText('answer_a')->nullable();
            $table->longText('answer_b')->nullable();
            $table->longText('answer_c')->nullable();
            $table->longText('answer_d')->nullable();
            $table->longText('answer_e')->nullable();
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
        Schema::dropIfExists('quiz_tryouts');
    }
}
