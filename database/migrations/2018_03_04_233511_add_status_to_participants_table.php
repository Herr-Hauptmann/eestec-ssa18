<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participanti', function (Blueprint $table) {
            $table->string('status')->default(config('platforma.statusi')[0]);
            $table->string('mjesto_prebivalista')->nullable();
            $table->string('slika')->nullable();
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
            $table->dropColumn(['status', 'mjesto_prebivalista', 'slika']);
        });
    }
}
