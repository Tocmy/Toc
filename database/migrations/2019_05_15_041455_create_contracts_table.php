<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('contract_no');
			$table->string('name');
			$table->tinyInteger('is_contract');
			$table->string('contract_method');
			$table->string('contract_scope');
			$table->string('contract_requirement');
			$table->string('contract_restrict');
			$table->dateTime('contract_start');
			$table->dateTime('contract_end');
			$table->bigInteger('period_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
			$table->tinyInteger('is_Trial');
			//remove
			$table->enum('contract_term', ['day', 'week', 'semi_month', 'month', 'year']);
			$table->enum('contract_service', ['day', 'week', 'semi_month', 'month', 'year']);
			$table->decimal('contract_fee',15,4);
			$table->decimal('contract_adhoc',15,4);
        });

        Schema::create('contract_plans', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('contract_id')->unsigned();
			$table->string('name');
			$table->text('description')->nullable();
			$table->decimal('price', 15,4)->default('0.0000');
		});

        Schema::create('periods', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('group')->nullable();
			$table->string('name');
			$table->string('interval');
			$table->integer('interval_count');
			$table->tinyInteger('interval_cycle');
			$table->tinyInteger('interval_duration');

		});

        Schema::table('contracts', function(Blueprint $table) {
            $table->foreign('period_id')->references('id')->on('periods')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('companies')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

           });

           Schema::table('contract_plans', function(Blueprint $table) {
            $table->foreign('contract_id')->references('id')->on('contract_plans')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
           });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('contract_plans');
        Schema::dropIfExists('periods');

        Schema::table('contracts', function(Blueprint $table) {
            $table->dropForeign(['period_id', 'customer_id', '']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['company_id']);
       });

       Schema::table('contract_plans', function(Blueprint $table) {
            $table->dropForeign(['contract_id']);
       });
    }
}
