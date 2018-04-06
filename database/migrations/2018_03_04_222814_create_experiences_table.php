<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('position')->nullable();
            $table->date('from_month')->nullable();
            $table->date('to_month')->nullable();
            $table->text('content')->nullable();
            $table->string('type')->nullable();
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participanti');
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
        Schema::drop('experiences');
    }
}
