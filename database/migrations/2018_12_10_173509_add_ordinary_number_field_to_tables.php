<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdinaryNumberFieldToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontakts', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });

        Schema::table('media', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });

        Schema::table('partners', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });

        Schema::table('trainers', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });

        Schema::table('trainings', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });

        Schema::table('participanti', function(Blueprint $table) {
            $table->integer('ssa_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontakts', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });

        Schema::table('media', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });

        Schema::table('partners', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });

        Schema::table('trainers', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });

        Schema::table('trainings', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });

        Schema::table('participanti', function(Blueprint $table) {
            $table->removeColumn('ssa_year');
        });
    }
}
