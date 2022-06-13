<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameInfrastructureTypeInUserReactionSignalement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_reaction_signalement', function (Blueprint $table) {
            $table->renameColumn('infrastructure_type', 'reaction_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_reaction_signalement', function (Blueprint $table) {
            //
        });
    }
}
