<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeParticipantsColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participanti', function(Blueprint $table) {
            $table->string('ime')->nullable()->change();
            $table->string('prezime')->nullable()->change();
            $table->date('datum_rodjenja')->nullable()->change();
            $table->text('broj_telefona')->nullable()->change();
            $table->longText('motivaciono')->nullable()->change();
            $table->boolean('accepted', false)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
