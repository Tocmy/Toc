<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->tinyInteger('approved')->default('0');
			$table->ipAddress('ip');
			$table->datetime('date_create');
			$table->float('rating');
			$table->integer('rating_sum');
			$table->integer('rating_count');
			$table->string('author', 100);
			$table->string('title');
			$table->text('text');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('rating_types', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->smallInteger('position')->default('0');
            $table->foreignId('category_id')->constrained('categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});
		Schema::create('rating_summaries', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('rating_sum');
			$table->bigInteger('rating_count');
			$table->float('rating');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('rating_type_id')->constrained('rating_types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});
		Schema::create('ratings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('rating');
			$table->ipAddress('ip');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('rating_type_id')->constrained('rating_types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  $table->foreignId('customer_id')->constrained('customers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('review_id')->constrained('reviews')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('rating_types');
        Schema::dropIfExists('rating_summaries');
        Schema::dropIfExists('ratings');
    }
}
