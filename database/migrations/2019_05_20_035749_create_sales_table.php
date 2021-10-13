<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->morphs('saleable');
			$table->tinyInteger('position');
			$table->tinyInteger('status')->default('1');
			$table->tinyInteger('condition')->default('0');
			$table->string('name');
			$table->decimal('deduction_value', 15,4)->default('0.0000');
			$table->decimal('price_range_from', 15,4)->default('0.0000');
			$table->decimal('price_range_to', 15,4)->default('0.0000');
			$table->datetime('date_start');
			$table->datetime('date_end');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('store_id')->constrained('companies')
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
        Schema::dropIfExists('sales');
        
    }
}
