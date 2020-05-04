<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_creations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_si')->nullable();
            $table->string('title_ta')->nullable();
            $table->string('video')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('writer_en')->nullable();
            $table->string('writer_si')->nullable();
            $table->string('writer_ta')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_si')->nullable();
            $table->text('content_ta')->nullable();
            $table->tinyInteger('status')->nullable(); // 0:pending, 1:active, 2:reject
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_creations');
    }
}
