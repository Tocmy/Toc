<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
			$table->integer('duration');
			$table->string('cover');
			$table->string('exclude');
			$table->text('condition');
            
        });

        //customer purchase extend warranty .
		Schema::create('warranty_orders', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('upc');
			$table->string('warranty_serial')->unique();
			$table->tinyInteger('status');
			$table->tinyInteger('check_warranty');
			$table->tinyInteger('is_ship')->default('0');
			$table->datetime('ship_date');

		});

		Schema::create('warranty_products', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('product_name');
			$table->string('product_model');
			$table->decimal('product_price', 15,4);
			$table->decimal('product_cost', 15,4);
			$table->string('products_image');
			$table->tinyInteger('product_status');
			$table->string('product_series_no');
			$table->decimal('cost', 15,4);
			$table->integer('year');
			$table->string('charge');
            $table->datetime('date_start')->nullable();
			$table->datetime('expire_at');

		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranties');
        Schema::dropIfExists('warranty_orders');
        Schema::dropIfExists('warranty_products');
    }
}
