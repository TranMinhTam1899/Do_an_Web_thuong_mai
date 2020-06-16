<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('produce_id')->unsigned();
        $table->foreign('produce_id')->references('id')->on('produces')->onDelete('cascade');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->integer('post_id')->unsigned();
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); 
        $table->string('url')->nullable();
        $table->string('style');
        $table->integer('status');
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
        Schema::dropIfExists('imgs');
    }
}
