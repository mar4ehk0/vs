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
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('format_id');
            $table->text('source_path');
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('format_id')->references('id')->on('formats');
            $table->unique(['video_id', 'format_id', 'source_path'], 'unique_key_video_sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_sources');
    }
};
