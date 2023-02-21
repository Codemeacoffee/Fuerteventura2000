<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('moduleId')->unsigned();
            $table->bigInteger('unitId')->unsigned();
            $table->timestamps();
        });

        Schema::table('module_units', function($table) {
            $table->foreign('moduleId')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('unitId')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_units');
    }
}
