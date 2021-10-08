<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
			$table->bigInteger('discount_id')->unsigned();
			$table->integer('discount_number');
			$table->tinyInteger('display_details');
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
			$table->tinyInteger('override');
			$table->bigInteger('subproduct_id')->unsigned();
			$table->integer('sub_product_qty')->nullable();
        });

        Schema::create('combo_product', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('combo_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();


		});


		Schema::create('combo_category', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('combo_id')->unsigned();
			$table->bigInteger('category_id')->unsigned();

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos');
        Schema::dropIfExists('combo_product');
        Schema::dropIfExists('combo_category');
    }
}
