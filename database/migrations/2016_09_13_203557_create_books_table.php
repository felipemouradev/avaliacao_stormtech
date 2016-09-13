<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 90)->nullable();
            $table->integer('year_edition')->nullable();
            $table->integer('author_id')->unsigned();

            $table->foreign('author_id')->references('id')->on('authors');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
