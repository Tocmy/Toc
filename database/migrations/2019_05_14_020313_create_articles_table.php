<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_blog');
            $table->tinyInteger('allow_comment');
            $table->string('image');
            $table->string('article_related_method', 64);
            $table->text('article_related_option');
            $table->integer('position');
            $table->tinyInteger('status')->default('0');
            $table->dateTime('published_date')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            //$table->bigInteger('tag_id')->unsigned();
            //$table->bigInteger('seo_id')->unsigned();
        });

        Schema::create('article_description_extras', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('extra_description');
        });

        Schema::create('article_relateds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('position');
            $table->tinyInteger('status')->default('0');
        });

        Schema::create('article_topic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->morphs('commentable');
            $table->text('comments');
            $table->tinyInteger('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_description_extras');
        Schema::dropIfExists('article_relateds');
        Schema::dropIfExists('article_topic');
        Schema::dropIfExists('comments');
    }
}
