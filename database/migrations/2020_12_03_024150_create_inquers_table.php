<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquers', function (Blueprint $table) {
            $table->increments('i_id');
            $table->string('i_firstName');
            $table->string('i_LastName');
            $table->string('i_email');
            $table->string('i_phone');
            $table->string('i_key');
            $table->string('i_country');
            $table->string('i_comment')->nullable();
            $table->enum('seen', ['0', '1']);
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
        Schema::dropIfExists('inquers');
    }
}
