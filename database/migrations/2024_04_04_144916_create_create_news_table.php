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
        Schema::create('create_news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title');
            $table->string('slug');
            $table->bigInteger('news_category');
            $table->bigInteger('news_sub_category');
            $table->text('sort_description');
            $table->text('description');
            $table->string('thumbnail');
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
        Schema::dropIfExists('create_news');
    }
};
