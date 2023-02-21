<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_departures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('courseId')->unsigned();
            $table->string('title', 250);
            $table->timestamps();
        });

        Schema::table('professional_departures', function($table) {
            $table->foreign('courseId')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_departures');
    }
}
