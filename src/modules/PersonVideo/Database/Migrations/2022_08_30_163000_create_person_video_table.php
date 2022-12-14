<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('position_id');

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->unique(['person_id', 'video_id', 'position_id'], 'unique_person_id_video_id_position_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_video');
    }
};
