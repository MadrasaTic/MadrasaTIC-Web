<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RenameInfrastructureIdInSignalements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signalements', function (Blueprint $table) {
            $table->renameColumn('infrastructure_id', 'annexe_id')->nullable();
            $table->unsignedBigInteger('bloc_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            DB::statement("ALTER TABLE signalements MODIFY COLUMN infrastructure_type ENUM('annexe', 'bloc', 'room')");
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
