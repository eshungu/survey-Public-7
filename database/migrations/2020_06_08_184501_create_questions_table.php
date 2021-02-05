<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('questionId');
            // $table->integer('formId')->unsigned();
            $table->integer('formSectionId')->unsigned();
            $table->string('questionContent');
            $table->string('questionType');
            $table->timestamps();
        });

        // Schema::table('questions', function (Blueprint $table) {
        //         // $table->foreign('formId')->references('formId')->on('forms');
        //         $table->foreign('formSectionId')->references('formSectionId')->on('formSections');
        // });
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
