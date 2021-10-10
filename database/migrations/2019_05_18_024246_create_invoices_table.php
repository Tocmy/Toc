<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('invoice_prefix', 26);
			$table->string('invoice_number')->unique();
			$table->string('invoice_status_code');
			$table->date('invoiced_at');
			$table->date('due_at');
			$table->double('amount', 15,4);
			$table->string('currency_code');
			$table->text('notes');
			$table->string('attachment')->nullable();
            $table->foreignId('currency_id')->constrained('currencies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('history_id')->constrained('histories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('statu_id')->constrained('statuses')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });



        Schema::create('invoice_payments', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
		    $table->softDeletes();
		    $table->date('paid_at');
            $table->double('amount', 15, 4);
            $table->double('currency_rate', 15, 8);
            $table->text('description')->nullable();
            $table->string('reference')->nullable();
            $table->string('attachment')->nullable();
            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained('invoices')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('Payment_methods')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('currency_id')->constrained('currencies')
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
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_payments');

    }
}
