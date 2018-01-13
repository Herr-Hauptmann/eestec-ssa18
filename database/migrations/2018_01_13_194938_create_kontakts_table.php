<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKontaktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pozicija')->nullable();
            $table->string('ime')->nullable();
            $table->string('prezime')->nullable();
            $table->string('email')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kontakts');
    }
}
