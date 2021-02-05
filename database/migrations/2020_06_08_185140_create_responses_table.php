<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('responseId');
            $table->integer('questionId')->unsigned();      
            $table->string('responseContent');
            $table->double('responseValue',15,8);
            $table->timestamps();
        });

        // Schema::table('responses', function (Blueprint $table) {
        //     $table->foreign('questionId')->references('questionId')->on('questions');
        //  });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
