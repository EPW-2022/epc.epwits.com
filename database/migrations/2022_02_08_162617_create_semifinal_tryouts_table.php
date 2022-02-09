<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemifinalTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semifinal_tryouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->integer('number')->default(1);
            $table->enum('category', ['Easy', 'Medium', 'Hard'])->nullable();
            $table->enum('laboratory', ['Energi', 'Fotonika', 'Vibrastik', 'Instrumentasi', 'Bahan'])->nullable();
            $table->boolean('availabled')->default(FALSE);
            $table->longText('question')->nullable();
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
        Schema::dropIfExists('semifinal_tryouts');
    }
}
