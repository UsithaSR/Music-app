<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeHubImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_hub_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_si')->nullable();
            $table->string('title_ta')->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumbnail')->nullable();
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
        Schema::dropIfExists('knowledge_hub_images');
    }
}
