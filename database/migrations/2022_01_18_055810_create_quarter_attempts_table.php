<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuarterAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarter_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('team_number');
            $table->string('token');
            $table->dateTime('attempt_at');
            $table->dateTime('finished_at')->nullable();
            $table->string('session')->nullable();
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
        Schema::dropIfExists('quarter_attempts');
    }
}
