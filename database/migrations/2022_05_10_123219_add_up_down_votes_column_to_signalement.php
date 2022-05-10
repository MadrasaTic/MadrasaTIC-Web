<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpDownVotesColumnToSignalement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signalements', function (Blueprint $table) {
            $table->integer('up_votes')->nullable()->default(0);
            $table->integer('down_votes')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signalements', function (Blueprint $table) {
            //
        });
    }
}
