<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->tinyInteger('customer_type');
			$table->string('image')->nullable();
			$table->string('designation');
			$table->string('description')->nullable();
			$table->ipAddress('ip');
			$table->tinyInteger('status')->default('1');
			$table->tinyInteger('approved');
			$table->tinyInteger('terms');
			$table->string('slug');
			$table->date('birthday')->nullable();
            $table->char('gender', 1)->nullable();


        });
        Schema::create('customer_baskets', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->float('quantity', 10,2)->nullable();
			$table->decimal('amount', 15,4)->default('0.0000')->nullable();
			$table->date('date_added');
			$table->text('description');

		});
		Schema::create('customer_basket_attributes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('text', 32);

		});


		Schema::create('customer_fields', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->text('value');
			$table->integer('position');

		});
		Schema::create('customer_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->tinyInteger('group_type');
			$table->tinyInteger('group_discount');
			$table->text('description');
			$table->boolean('approval');
			$table->integer('position');
			//from setting
			$table->tinyInteger('company_id_display')->default(0);
			$table->tinyInteger('company_id_required')->default(0);
			$table->tinyInteger('tax_id_display')->default(0);
			$table->tinyInteger('tax_id_required')->default(0);
			$table->string('payment_allowed',255);
			$table->string('payment_terms',255);
			$table->string('shipment_allowed',255);
            $table->string('taxes_exempt',255);
			$table->string('order_total_allowed',255);

		});
		//customer history and activity
		Schema::create('customer_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('amount', 15,4)->default('0.0000');


		});
		Schema::create('customer_ips', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('ip', 40);
			$table->boolean('block_ip');
			$table->string('to_ip', 32);
			$table->string('from_ip', 32);

		});
		Schema::create('customer_onlines', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('first_name');
			$table->string('ip_address');
			$table->string('hostname');
			$table->string('country_code', 2);
			$table->string('country_name');
			$table->string('region', 64);
			$table->string('city', 64);
			$table->float('latitute');
			$table->float('longtitude');
			$table->time('time_entry');
			$table->time('time_last_click');
			$table->string('referrer');
			$table->string('agent');

		});

        Schema::create('customer_bans', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
            $table->softDeletes();
			$table->morphs('bannable');
            $table->text('comment')->nullable();
            $table->timestamp('expired_at')->nullable()->index();

		});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_baskets');
        Schema::dropIfExists('customer_basket_attributes');
        Schema::dropIfExists('customer_fields');
        Schema::dropIfExists('customer_groups');
        Schema::dropIfExists('customer_histories');
        Schema::dropIfExists('customer_ips');
        Schema::dropIfExists('customer_bans');
        Schema::dropIfExists('customer_onlines');

    }
}
