<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->increments('a_id');
            $table->string('a_title');
            $table->longText('a_description');
            $table->string('a_email')->nullable();
            $table->string('a_phone')->nullable();
            $table->longText('a_image');
            $table->string('a_facebook')->nullable();
            $table->integer('a_numOfCourses')->nullable();
            $table->integer('a_numOfStudents')->nullable();
            $table->integer('a_numOfTeachers')->nullable();
            $table->integer('a_numOfSessions')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
