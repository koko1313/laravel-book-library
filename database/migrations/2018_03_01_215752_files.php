<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('files', function(Blueprint $table){
            $table->increments('id');
            $table->string('file_name');
            $table->string('file_title');
            $table->string('language');
            $table->string('cover')->nullable();
            $table->integer('book_id')->unsigned();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
