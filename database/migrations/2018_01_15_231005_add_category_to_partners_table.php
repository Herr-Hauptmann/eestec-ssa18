<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryToPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->string('website')->nullable();
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->removeColumn('category');
            $table->removeColumn('website');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->removeColumn('website');
        });
    }
}
