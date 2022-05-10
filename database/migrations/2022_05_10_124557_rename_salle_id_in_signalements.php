<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSalleIdInSignalements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signalements', function (Blueprint $table) {
            $table->renameColumn('salle_id', 'infrastructure_id');
            $table->enum('infrastructure_type', ['annexe', 'bloc', 'salle']);
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
