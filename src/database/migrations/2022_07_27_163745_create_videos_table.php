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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->dateTime('year');
            $table->integer('duration')->unsigned();
            $table->string('country', 2);
            $table->integer('age_limit')->unsigned();
            $table->unsignedBigInteger('translation_id');
            $table->string('type')->index();
            $table->timestamps();

            $table->foreign('translation_id')->references('id')->on('translations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
