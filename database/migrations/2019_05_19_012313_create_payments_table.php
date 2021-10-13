<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
			$table->datetime('paid_at');
			$table->double('amount', 15,4)->default('0.0000');
			$table->text('description')->nullable();
			$table->string('reference')->nullable();
			$table->string('attachment')->nullable();
            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('currency_id')->constrained('currencies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('payment_methods', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->tinyInteger('position');
			$table->tinyInteger('status')->default('0');
            $table->foreignId('module_id')->constrained('modules')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('merchant_id')->constrained('merchants')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});

        Schema::create('payment_settings', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->longText('value');
            $table->foreignId('setting_id')->constrained('settings')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});
        //provice service provice details
        Schema::create('merchants', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


		});
        Schema::create('wallets', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
            $table->morphs('holder');
            $table->string('name');
            $table->string('slug')->index();
            $table->string('description')->nullable();
            $table->float('balance', 10, 0)->nullable()->default(0.00);
            $table->integer('status')->unsigned()->default(1);
            $table->unique(['holder_type', 'holder_id', 'slug']);

            $table->BigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->BigInteger('currency_id')->unsigned()->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');

		});
        //emart
        Schema::create('wallet_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('wallet_id')->unsigned();
            $table->string('type');
            $table->string('log')->nullable();
            $table->string('txn_id')->nullable();
            $table->float('amount', 10, 0)->nullable();
            $table->timestamps();
            $table->timestamp('expire_at')->nullable();
            $table->integer('expired')->default(0)->unsigned();
            $table->foreignId('wallet_id')->constrained('wallets')
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
        Schema::dropIfExists('payments');
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('payment_settings');
        Schema::dropIfExists('merchants');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('wallet_histories');
    }
}
