<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 250);
            $table->text('description')->nullable();
            $table->string('init_date', 10)->default('');
            $table->string('end_date', 10)->default('');
            $table->string('location', 100);
            $table->string('type', 100);
            $table->string('receiver', 100)->nullable();
            $table->string('schedule', 100)->nullable();
            $table->integer('level')->nullable();
            $table->string('onSite', 100);
            $table->boolean('display')->default(1);
            $table->boolean('promote')->default(0);
            $table->string('sector', 250);
            $table->integer('hours')->nullable();
            $table->string('teacher', 250)->nullable();
            $table->text('teacherDescription')->nullable();
            $table->text('requirements')->nullable();
            $table->float('price')->nullable();
            $table->string('alt', 250);
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
        Schema::dropIfExists('courses');
    }
}
