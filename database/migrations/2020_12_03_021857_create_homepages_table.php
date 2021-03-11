<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->increments('h_id');
            $table->longText('h_logo')->nullable();
            $table->longText('h_icon')->nullable();
            $table->string('h_title')->nullable();
            $table->string('h_description')->nullable();
            $table->longText('h_background')->nullable();
            $table->longText('h_seoKeywords')->nullable();
            $table->longText('h_seoDescription')->nullable();
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
        Schema::dropIfExists('homepages');
    }
}
