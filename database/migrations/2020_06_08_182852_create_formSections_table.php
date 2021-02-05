<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formSections', function (Blueprint $table) {
            $table->increments('formSectionId');
            $table->integer('formId');
            $table->string('formSectionName');
            $table->timestamps();
        });

        // Schema::table('formSections', function (Blueprint $table) {
        //     $table->foreign('formId')->references('formId')->on('forms');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formSections');
    }
}
