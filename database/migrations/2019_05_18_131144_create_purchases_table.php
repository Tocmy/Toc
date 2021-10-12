<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('po_number')->unique();
			$table->string('name', 255);
			$table->string('model', 64);
			$table->string('image', 255);
			$table->decimal('price', 15,4)->default('0.0000');
			$table->decimal('price_per_piece', 15,4)->default('0.0000');
			$table->decimal('ship_cost', 15,4)->default('0.0000');
			$table->decimal('total_cost', 15,4)->default('0.0000');
			$table->decimal('avg_cost', 15,4)->default('0.0000');
			$table->bigInteger('unit');
			$table->string('colour', 64);
			$table->string('size', 64);
			$table->decimal('quantity', 15,4)->nullable();
			$table->decimal('length', 15,8)->default('0.00000000');
			$table->decimal('width', 15,8)->default('0.00000000');
			$table->decimal('height', 15,8)->default('0.00000000');
			$table->decimal('weight', 15,8)->default('0.00000000');
			$table->tinyInteger('status')->default('1');
            $table->date('date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->foreignId('length_id')->constrained('lengths')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('weight_id')->constrained('weigths')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('tax_id')->constrained('taxes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('currency_id')->constrained('currencies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('purchase_attributes', function(Blueprint $table) {
			$table->timestamps();
			$table->text('text');
            $table->foreignId('purchase_id')->constrained('purchases')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('attribute_id')->constrained('attributes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('purchase_returns', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('return_quantity');
			$table->string('return_number')->unique();
			$table->datetime('return_date');
			$table->string('reason', 64);
			$table->tinyInteger('status')->default('0');
            $table->foreignId('purchase_id')->constrained('purchases')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->datetime('purchase_date');
			$table->tinyInteger('status')->default('1');
			$table->datetime('receive_date');
			$table->tinyInteger('receive')->default('0');
			$table->tinyInteger('pending')->default('1');
			$table->integer('balance_qty');
			$table->text('remark');
        });


		//whose can perform the purchase, it nessacry?
		Schema::create('stock_receives', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('quantity');
			$table->foreignId('purchase_id')->constrained('purchases')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('stock_id')->constrained('stocks')
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
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchase_attributes');
        Schema::dropIfExists('purchase_returns');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('stock_receives');



    }
}
