<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique;
            $table->string('unit');
            $table->string('SKU');
            $table->string('desc');
            $table->text('short_desc');
            $table->integer('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('author_id')->unsigned();
            //$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('price');
            $table->string('discout_price');
            $table->string('status');

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
        Schema::dropIfExists('produces');
    }
}
