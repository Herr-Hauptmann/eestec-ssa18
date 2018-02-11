<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOldApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_applications', function(Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->date('created_at')->default(date('Y-m-d'));
            $table->boolean('accepted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_applications');
    }
}
