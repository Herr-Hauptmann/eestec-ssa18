<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->float('engleski')->default('0');
            $table->float('motivaciono')->default('0');
            $table->float('trenutno_zaposlenje')->default('0');
            $table->float('ucesce_na_treninzima')->default('0');
            $table->float('ucesce_na_seminarima')->default('0');
            $table->float('nvo_iskustvo')->default('0');
            $table->float('bodovi')->default('0');
            $table->boolean('asterix')->default('0');
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participanti');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('points');
    }
}
