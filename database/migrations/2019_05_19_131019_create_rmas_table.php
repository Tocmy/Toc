<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			//$table->bigInteger('customer_id')->unsigned();
			$table->bigInteger('address_id')->unsigned();
			//$table->bigInteger('rma_reason_id')->unsigned();
			//$table->bigInteger('rma_action_id')->unsigned();
			//$table->bigInteger('status_id')->unsigned();
			$table->integer('quantity');
			$table->tinyInteger('opened');
			$table->text('comment');
			$table->datetime('date_order');
			$table->datetime('date_finish');
			$table->string('po_number',25);
			$table->string('ref',25)->unique();
            $table->foreignId('customer_id')->constrained('customers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('rma_reason_id')->constrained('rma_reasons')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('rma_action_id')->constrained('rma_actions')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('history_id')->constrained('histories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        //rma details
        //product return required model, name price,discount,tax,qty,serial no
		//required fill by customer for RMA Form
		Schema::create('rma_products', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->decimal('amount', 15,4);
            $table->enum('process',['returned', 'exchange', 'refund'])->default('returned');
			$table->tinyInteger('accepted')->default('0');//companies accepted customer request or any dispute
            $table->foreignId('rma_id')->constrained('rmas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});
        Schema::create('rma_reasons', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');

		});


		//refund method is same refund,replacement,gift voucher. then
		Schema::create('rma_actions', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');

		});
		//customer method =payment method
		Schema::create('refunds', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('payment_name');
			$table->decimal('payment_value', 15,4);
			$table->datetime('payment_date');
			$table->string('payment_reference', 50);
			$table->decimal('payment_deductions', 15,4);
			$table->string('customer_method', 50);
            $table->foreignId('rma_id')->constrained('rmas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')
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
        Schema::dropIfExists('rmas');
        Schema::dropIfExists('rma_reasons');
        Schema::dropIfExists('rma_actions');
        Schema::dropIfExists('rma_products');
        Schema::dropIfExists('refunds');
    }
}
