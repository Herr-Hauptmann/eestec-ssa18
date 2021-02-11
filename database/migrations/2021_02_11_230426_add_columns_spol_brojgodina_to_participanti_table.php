<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsSpolBrojgodinaToParticipantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participanti', function (Blueprint $table) {
            $table->integer('broj_godina')->default('0');
            $table->string('spol')->nullable();
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
            $table->dropColumn(['broj_godina', 'spol']);
        });
    }
}
