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

        Schema::table('brand_store', function(Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('companies')
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
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brand_store');
        Schema::table('brand_store', function(Blueprint $table) {
            $table->dropForeign(['brand_id', 'store_id']);

   });
    }
}
