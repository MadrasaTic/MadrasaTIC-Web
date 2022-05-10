<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalementVersionControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalement_version_controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('signalement_id');
            $table->unsignedBigInteger('attached_signalement_id')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('category_id');
            $table->string('attachement');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('priority_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signalement_version_controls');
    }
}
