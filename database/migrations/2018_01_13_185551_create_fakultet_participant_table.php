<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFakultetParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakultet_participant', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participanti')->onDelete('cascade');
            $table->integer('fakultet_id')->unsigned();
            $table->foreign('fakultet_id')->references('id')->on('fakulteti')->onDelete('cascade');
            $table->integer('godina');
            $table->string('odsjek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fakultet_participant');
    }
}
