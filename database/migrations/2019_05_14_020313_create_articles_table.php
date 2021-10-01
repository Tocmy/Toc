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
			$table->bigInteger('author_id')->unsigned();
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
			$table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('seo_id')->unsigned();
        });

        Schema::create('article_description_extras', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('article_id')->unsigned();
			$table->string('extra_description');

		});

		Schema::create('article_product', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('article_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();
		});

		Schema::create('article_relateds', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('article_id')->unsigned();
			$table->bigInteger('related_id')->unsigned();
			$table->bigInteger('position');
			$table->tinyInteger('status')->default('0');
		});

		Schema::create('article_store', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('article_id')->unsigned();
			$table->bigInteger('store_id')->unsigned();
		});


		Schema::create('article_topic', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('article_id')->unsigned();
			$table->bigInteger('topic_id')->unsigned();
		});

		Schema::create('comments', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->morphs('commentable');
			$table->bigInteger('customer_id')->unsigned();
			$table->bigInteger('article_id')->unsigned();
			$table->bigInteger('reply_id')->unsigned();
			$table->bigInteger('author_id')->unsigned();
			$table->text('comments');
			$table->tinyInteger('status')->default('0');
		});

        Schema::table('articles', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('seo_id')->references('id')->on('seos')
						->onDelete('cascade')
                        ->onUpdate('cascade');

        });

        Schema::table('article_product', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
                        ->onUpdate('cascade');

        });

        Schema::table('article_relateds', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('related_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');

        });

        Schema::table('article_store', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('companies')
						->onDelete('cascade')
                        ->onUpdate('cascade');

        });

        Schema::table('article_topic', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('topic_id')->references('id')->on('categories')
						->onDelete('cascade')
                        ->onUpdate('cascade');

        });

        Schema::table('comments', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('reply_id')->references('id')->on('comments')
						->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')
						->onDelete('cascade')
                        ->onUpdate('cascade');
           $table->foreign('author_id')->references('id')->on('users')
						->onDelete('cascade')
                        ->onUpdate('cascade');

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
        Schema::dropIfExists('article_product');
        Schema::dropIfExists('article_relateds');
        Schema::dropIfExists('article_store');
        Schema::dropIfExists('article_topic');
        Schema::dropIfExists('comments');
        Schema::table('articles', function(Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['seo_id']);

        });

        Schema::table('article_product', function(Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['product_id']);


        });

        Schema::table('article_relateds', function(Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['related_id']);

        });

        Schema::table('article_store', function(Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['store_id']);


        });

        Schema::table('article_topic', function(Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['topic_id']);


        });

        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['reply_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['author_id']);

        });

    }
}
