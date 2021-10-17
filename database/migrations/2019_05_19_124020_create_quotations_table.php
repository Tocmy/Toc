<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->datetime('quote_send');
			$table->date('expiry_date');
			$table->string('description');
			$table->string('subject');
            $table->string('term');
			$table->string('payment_term');
			$table->string('delivery_term');
			$table->string('ref', 64)->unique();
            
        });



        Schema::create('quotation_products', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('quantity');
			$table->decimal('price', 15,4)->default('0.00');
			$table->decimal('subtotal', 15,4)->default('0.00');
			$table->string('description');
			$table->decimal('base_price', 15,4);
            $table->decimal('total_qty');
            $table->decimal('total_discount');
            $table->decimal('total_tax');
            $table->decimal('total_price');
            $table->decimal('tax_rate')->nullable();
            $table->decimal('tax')->nullable();
            $table->double('discount')->nullable();
            $table->decimal('shipping_cost')->nullable();
            $table->double('grand_total');


		});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
        Schema::dropIfExists('quotation_products');

    }
}
