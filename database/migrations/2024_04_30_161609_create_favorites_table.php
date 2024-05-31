<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('stretch_id')->unsigned()->nullable();
            $table->bigInteger('training_muscle_id')->unsigned()->nullable();
            $table->bigInteger('training_mix_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('stretch_id')->references('id')->on('training_stretches');
            $table->foreign('training_muscle_id')->references('id')->on('training_muscles');
            $table->foreign('training_mix_id')->references('id')->on('training_mixes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}