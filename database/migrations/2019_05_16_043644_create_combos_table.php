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
            $table->integer('discount_number');
            $table->tinyInteger('display_details');
            $table->smallInteger('position');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('override');
            $table->integer('sub_product_qty')->nullable();
            $table->foreignId('subproduct_id')->nullable()->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('discount_id')->constrained('discounts')
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
        Schema::dropIfExists('combos');

        //Schema::table('combos', function(Blueprint $table) {
            //$table->dropForeign(['discount_id', 'product_id', 'category_id', 'subproduct_id']);

     //});
    }
}
