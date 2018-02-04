<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGlasaliCountColumnToParticipanti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participanti', function (Blueprint $table) {
            $table->integer('glasali_count')->default('0');
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
            $table->removeColumn('glasali_count');
        });
    }
}
