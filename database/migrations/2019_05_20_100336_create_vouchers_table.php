<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('code',64)->unique();
			$table->string('description');
			$table->string('name');
			$table->string('slug');
			$table->string('series_no');
			$table->integer('quantity');
			$table->string('sender');
			$table->string('from_email');
			$table->string('recipient');
			$table->string('to_email');
			$table->integer('expiry_period');
			$table->text('message');
			$table->decimal('amount', 15,4)->default('0.0000');
			$table->tinyInteger('status')->default('0');

            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('theme_id')->constrained('voucher_contents')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('voucher_contents', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('image');
            $table->string('name');

		});

		Schema::create('voucher_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->decimal('amount', 15,4)->default('0.0000');
            $table->foreignId('order_id')->constrained('orders')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('voucher_id')->constrained('vouchers')
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
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('voucher_contents');
        Schema::dropIfExists('voucher_histories');
    }
}
