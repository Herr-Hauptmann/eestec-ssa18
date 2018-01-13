<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('participanti', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('ime');
            $table->string('prezime');
            $table->date('datum_rodjenja');
            $table->text('broj_telefona');
            $table->string('email');
            $table->string('velicina_majice')->nullable();
            $table->integer('engleski_govor')->nullable();
            $table->integer('engleski_razumijevanje')->nullable();
            $table->longText('motivaciono');
            $table->boolean('ranije_ucesce_na_ssa')->nullable();
            $table->text('kako_ste_saznali')->nullable();
            $table->longText('radno_iskustvo')->nullable();
            $table->boolean('trenutno_zaposlenje')->nullable();
            $table->longText('ucesce_na_treninzima')->nullable();
            $table->longText('ucesce_na_seminarima')->nullable();
            $table->longText('nvo_iskustvo')->nullable();
            $table->text('dodatne_napomene')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::drop('participanti');
    }
}
