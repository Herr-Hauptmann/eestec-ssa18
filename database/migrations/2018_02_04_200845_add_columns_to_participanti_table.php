<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToParticipantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participanti', function (Blueprint $table) {
            $table->float('ukupno_bodova')->default('0');
            $table->boolean('asterix')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participanti', function (Blueprint $table) {
            $table->removeColumn('ukupno_bodova');
            $table->removeColumn('asterix');
        });
    }
}
