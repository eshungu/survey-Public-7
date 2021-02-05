<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessionsTrainees', function (Blueprint $table) {
            $table->increments('sessionTraineeId');
            $table->integer('sessionId');
            $table->integer('traineeId');
            $table->timestamps();
        });

        // Schema::table('sessionsTrainees', function (Blueprint $table) {
        //     $table->foreign('sessionId')->references('sessionId')->on('sessions');
        //     $table->foreign('traineeId')->references('traineeId')->on('trainees');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessionsTrainees');
    }
}