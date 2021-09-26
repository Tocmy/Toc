<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('image');
			$table->integer('position');
			$table->tinyInteger('status')->default('1');
            $table->string('name');
			$table->string('url');
			$table->string('description');
        });

        Schema::create('brand_store', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('brand_id')->unsigned();
			$table->bigInteger('store_id')->unsigned();

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brand_store');
    }
}
