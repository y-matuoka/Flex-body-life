<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingMusclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_muscles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('training_name')->nullable();
            $table->text('description')->nullable();
            $table->string('training_image')->nullable();
            $table->tinyInteger('training_level')->default(0)->unsigned();
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
        Schema::dropIfExists('training_muscles');
    }
}
