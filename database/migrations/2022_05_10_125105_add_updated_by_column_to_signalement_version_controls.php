<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedByColumnToSignalementVersionControls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signalement_version_controls', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by');
        });

        Schema::table('signalements', function (Blueprint $table) {
            $table->dropColumn('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signalement_version_controls', function (Blueprint $table) {
            //
        });
    }
}
