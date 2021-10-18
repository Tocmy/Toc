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
			$table->integer('quantity');
			$table->tinyInteger('opened');
			$table->text('comment');
			$table->datetime('date_order');
			$table->datetime('date_finish');
			$table->string('po_number',25);
			$table->string('ref',25)->unique();

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
