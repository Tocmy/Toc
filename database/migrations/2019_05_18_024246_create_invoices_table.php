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
