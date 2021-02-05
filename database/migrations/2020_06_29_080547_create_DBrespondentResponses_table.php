<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateDBrespondentResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DBrespondentResponses', function (Blueprint $table) {

            $table->increments('DBrespondentResponseId');  
            $table->integer('traineeId')->unsigned();
            $table->integer('sessionId')->unsigned();       
            $table->integer('questionId')->unsigned();
            $table->integer('responseId')->unsigned()->nullable();
            $table->float('responseValue');
            $table->string('responseText')->nullable();
            
            $table->timestamps();

        });

        // Schema::table('DBrespondentResponses', function (Blueprint $table) {

        //     $table->foreign('traineeId')->references('traineeId')->on('trainees');
        //     $table->foreign('sessionId')->references('sessionId')->on('sessions');
        //     $table->foreign('questionId')->references('questionId')->on('questions');
        //     $table->foreign('responseId')->references('responseId')->on('responses');
    
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DBrespondentResponses');
    }
}