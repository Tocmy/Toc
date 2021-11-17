<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('model', 64)->unique();
			$table->string('image');
			$table->decimal('price', 15,4)->default('0.0000');
			$table->decimal('cost', 15,4)->default('0.0000');
			$table->decimal('msrp', 15,4)->default('0.0000');
			$table->tinyInteger('quote');
			$table->smallInteger('age_minimum');
			$table->date('date_available');
			$table->integer('position')->default('0');
			$table->tinyInteger('status')->default('1');
			$table->integer('quantity')->default('0');
			$table->integer('minimum')->default('1');
			$table->tinyInteger('subtract')->default('1');
			$table->tinyInteger('shipping')->default('1');
			$table->string('sku');
			$table->string('upc', 12);
			$table->string('ean', 14);
			$table->string('jan', 13);
			$table->string('isbn', 13);
			$table->string('mpn', 64);
			$table->decimal('length', 15,8)->default('0.00000000');
			$table->decimal('width', 15,8)->default('0.00000000');
			$table->decimal('height', 15,8)->default('0.00000000');
			$table->decimal('weight', 15,8)->default('0.00000000');
			$table->integer('viewed');
			$table->string('bar_code')->nullable();
			$table->string('summary');
			$table->string('name');
			$table->text('description');
			$table->string('title');
			$table->string('slug');


        });
        Schema::create('product_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->decimal('customer_group_price', 15,4)->default('0.0000');
			$table->decimal('product_price', 15,4)->default('0.0000');
			$table->integer('qty_block');
			$table->integer('min_order_qty');
			$table->string('name',255);
			$table->string('handler',255);
			$table->string('image',255);
			$table->tinyInteger('master_group')->default('1');
			$table->tinyInteger('status')->default('1');

        });



		Schema::create('product_shippings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('zipcode', 32);
			$table->decimal('price', 15,4)->default('0.0000');
			$table->decimal('price_2', 15,4)->default('0.0000');


		});

		Schema::create('product_relateds', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();

		});

		Schema::create('product_profiles', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();




		});
		Schema::create('product_options', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->text('option_value');
			$table->tinyInteger('required');

		});
		Schema::create('product_option_values', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('quantity');
			$table->tinyInteger('subtract');
			$table->decimal('price', 15,4);
			$table->string('price_prefix', 1);
			$table->integer('point');
			$table->string('points_prefix', 1);
			$table->decimal('weight', 15,8);
			$table->string('weight_prefix', 1);

		});
		Schema::create('product_location', function(Blueprint $table) {
			$table->timestamps();

		});

		Schema::create('product_images', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('image');
			$table->integer('position')->default('0');

		});

		Schema::create('product_discounts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('quantity')->default('0');
			$table->integer('priority')->default('1');
			$table->decimal('price', 15,4)->default('0.0000');
			$table->datetime('date_start');
			$table->datetime('date_end');

		});
		Schema::create('discounts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('amount');
			$table->float('min_range');
			$table->float('max_range');
			$table->integer('percentage');
			$table->tinyInteger('status')->default('1');

		});


		Schema::create('product_colours', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();

		});

		Schema::create('product_attributes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->text('text');

		});

		Schema::create('price_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
            $table->text('description')->nullable();
			$table->decimal('percentage', 15,4);
            $table->decimal('min_quantity', 15,4);
            $table->decimal('max_quantity', 15,4);
            $table->decimal('price', 15,4);
            $table->tinyInteger('status')->default('1');

		});

        Schema::create('colours', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
		});

		Schema::create('surfaces', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('colour_code', 6);
			$table->string('title', 64);

		});

		Schema::create('profiles', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('position');
			$table->tinyInteger('status')->default('1');
			$table->decimal('price', 15,4);
			$table->enum('frequency', ['day', 'week', 'semi_month', 'month', 'year']);
			$table->integer('duration');
			$table->integer('cycle');
			$table->tinyInteger('trial_status');
			$table->decimal('trial_price', 15,4);
			$table->enum('trial_frequency', ['day', 'week', 'semi_month', 'month', 'year']);
			$table->integer('trial_duration');
			$table->integer('trial_cycle');
            $table->string('name');

		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_groups');
        Schema::dropIfExists('product_shippings');
        Schema::dropIfExists('product_relateds');
        Schema::dropIfExists('product_profiles');
        Schema::dropIfExists('product_options');
        Schema::dropIfExists('product_option_values');
        Schema::dropIfExists('product_location');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_discounts');
        Schema::dropIfExists('product_colours');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('price_groups');
        Schema::dropIfExists('colours');
        Schema::dropIfExists('surfaces');
        Schema::dropIfExists('profiles');

    }
}
