<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blogs_id')->unsigned();
            $table->string('co_name');
            $table->string('co_image')->default('765-default-avatar.png');
            $table->string('co_phone');
            $table->string('co_email');
            $table->longText('co_text');
            $table->foreign('blogs_id')
                    ->references('id')
                    ->on('blogs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('blogcomments');
    }
}
