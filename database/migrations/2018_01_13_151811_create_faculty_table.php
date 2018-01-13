<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakulteti', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('naziv')->nullable();
            // $table->integer('godina')->nullable();
            // $table->string('odsjek')->nullable();
            // $table->integer('participant_id')->unsigned();
            // $table->foreign('participant_id')->references('id')->on('participanti');
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
        Schema::drop('fakulteti');
    }
}
