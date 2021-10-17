<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->integer('invoice_no')->default('0');
			$table->string('invoice_prefix', 26);
			$table->string('store_name');
			$table->string('store_url');
			$table->text('comment');
			$table->decimal('total', 15,4);
			$table->decimal('commission', 15,4);
			$table->string('currency_code', 3);
			$table->decimal('currency_value', 15,4)->default('1.00000000');
			$table->string('forward_ip', 40);
			$table->ipAddress('ip');
			$table->string('customer_agent');
			$table->string('accepted_langauge');

        });

        Schema::create('order_exchanges', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();

        });

        Schema::create('order_downloads', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();

		});

		Schema::create('order_history', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();



		});
		Schema::create('order_options', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->text('value');
			$table->string('type', 32);

		});

		Schema::create('order_products', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->string('model');
			$table->integer('quantity');
			$table->decimal('price', 15,4);
			$table->decimal('cost', 15,4)->default('0.0000');
			$table->decimal('total', 15,4)->default('0.0000');
			$table->decimal('tax', 15,4)->default('0.0000');
			$table->integer('reward');
			$table->string('backordered');
			$table->tinyInteger('picked');

		});


		Schema::create('order_recurrences', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('created');
			$table->tinyInteger('status');
			$table->string('product_name');
			$table->integer('product_quantity');
			$table->string('name');
			$table->string('description');
			$table->string('recurring_frequency');
			$table->smallInteger('recurring_cycle');
			$table->smallInteger('recurring_duration');
			$table->decimal('recurring_price', 15,4)->default('0.0000');
			$table->tinyInteger('trial');
			$table->string('trial_frequency', 25);
			$table->smallInteger('trial_cycle');
			$table->smallInteger('trial_duration');
			$table->decimal('trial_price', 15,4)->default('0.0000');
			$table->string('reference');

		});
		Schema::create('order_recurrence_transactions', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('created');
			$table->decimal('amount', 15,4);
			$table->string('type');

		});



		Schema::create('order_surcharges', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('type', 8);
			$table->string('code');
			$table->string('method');
			$table->tinyInteger('include');
			$table->tinyInteger('available')->unique();
			$table->decimal('value', 15,4)->default('0.0000');
			$table->string('name');

		});


		Schema::create('order_voucher', function(Blueprint $table) {
			$table->timestamps();

		});

		Schema::create('order_custom_fields', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->integer('name');
			$table->text('value');
			$table->smallInteger('position');


		});
		Schema::create('order_shippings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('shipping_cost',35);
			$table->string('shipping_tax',35);
			$table->integer('name');
			$table->text('value');
			$table->smallInteger('position');

		});

		Schema::create('order_types', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name',35);
			$table->string('method', 35);
			$table->tinyInteger('status')->default('1');
			$table->text('comments');


		});
        Schema::create('order_frauds', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('country_match', 3);
            $table->string('country_code', 2);
            $table->string('high_risk_country', 3);
            $table->integer('distance');
			$table->string('ip_region', 255);
            $table->string('ip_region_name', 255);
            $table->string('ip_city', 255);
            $table->decimal('ip_latitude', 10,6);
            $table->decimal('ip_longitude', 10,6);
            $table->string('ip_isp', 255);
            $table->string('ip_org', 255);
            $table->integer('ip_asnum');
            $table->string('ip_user_type', 255);
            $table->string('ip_country_confidence', 3);
            $table->string('ip_region_confidence', 3);
            $table->string('ip_city_confidence', 3);
            $table->string('ip_postal_confidence', 3);
            $table->string('ip_postal_code', 10);
            $table->integer('ip_accuracy_radius');
            $table->integer('ip_metro_code');
            $table->integer('ip_area_code');
            $table->string('ip_net_speed_cell', 255);
            $table->string('ip_time_zone', 255);
            $table->string('ip_domain', 255);
            $table->string('ip_country_name', 255);
            $table->string('ip_continent_code', 2);
            $table->string('ip_corporate_proxy', 3);
            $table->string('anonymous_proxy', 3);
            $table->integer('proxy_score');
            $table->string('is_trans_proxy', 3);
            $table->string('free_mail', 3);
            $table->string('carder_email', 3);
            $table->string('high_risk_username', 3);
            $table->string('high_risk_password', 3);
            $table->string('bin_match',10);
            $table->string('bin_country',2);
            $table->string('bin_name_match',3);
            $table->string('bin_name',255);
            $table->string('bin_phone_match',3);
            $table->string('bin_phone',32);
            $table->string('customer_phone_in_billing_location',8);
            $table->string('ship_forward',3);
            $table->string('city_postal_match',3);
            $table->string('ship_city_postal_match',3);
            $table->decimal('score',10,5);
            $table->text('explanation');
            $table->decimal('risk_score',10,5);
            $table->integer('queries_remaining');
            $table->string('provider_id');
            $table->text('error');

		});



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_exchanges');
        Schema::dropIfExists('order_downloads');
        Schema::dropIfExists('order_history');
        Schema::dropIfExists('order_options');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('order_recurrences');
        Schema::dropIfExists('order_recurrence_transactions');
        Schema::dropIfExists('order_surcharges');
        Schema::dropIfExists('order_voucher');
        Schema::dropIfExists('order_custom_fields');
        Schema::dropIfExists('order_shippings');
        Schema::dropIfExists('order_types');
        Schema::dropIfExists('order_frauds');
    }
}
