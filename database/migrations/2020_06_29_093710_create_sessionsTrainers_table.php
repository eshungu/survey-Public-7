<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessionsTrainers', function (Blueprint $table) {
            $table->increments('sessionTrainerId');
            $table->integer('sessionId');
            $table->integer('trainerId');
            $table->timestamps();
        });

        // Schema::table('sessionsTrainers', function (Blueprint $table) {
        //     $table->foreign('sessionId')->references('sessionId')->on('sessions');
        //     $table->foreign('trainerId')->references('trainerId')->on('trainers');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessionsTrainers');
    }
}
