<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('lifetime');
            $table->string('web', 96);
			$table->string('code', 64)->unique();
			$table->string('payment');
			$table->string('tax', 96);
			$table->ipAddress('ip');
            $table->tinyInteger('status')->default('0');
			$table->tinyInteger('approved')->default('0');



        });

        Schema::create('affiliate_payments', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->decimal('amount', 15,2)->default('0.00');
			$table->decimal('tax', 15,2)->default('0.00');
			$table->decimal('total', 15,2)->default('0.00');
			$table->datetime('payment_date');



        });

        Schema::create('affiliate_sales', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('date');
			$table->string('browser', 100);
			$table->ipAddress('ip')->nullable();
			$table->decimal('value', 15,2);
			$table->decimal('payment', 15,2);
			$table->integer('click_throughs_id')->default('0');
			$table->mediumInteger('billing_status');
			$table->datetime('payment_date');
			$table->decimal('percent', 4,2);
			$table->integer('salesman')->default('0');

        });

        Schema::create('affiliate_payment_statuses', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name', 32);

        });

        Schema::create('affiliate_payment_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
           	$table->tinyInteger('notified');



        });

        Schema::create('affiliate_news', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();


        });

        Schema::create('affiliate_banners', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();

		});

        Schema::create('affiliate_banner_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();

		});


        Schema::create('affiliate_clicks', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('client_date');
			$table->string('client_browser');
			$table->string('client_ip');
			$table->string('client_referer');
			$table->integer('click');

		});

        Schema::create('commissions', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->float('rate', 15,4)->default('0.0000');
			$table->datetime('date');
			$table->float('amount', 15,4);
			$table->string('name');
			$table->string('type');
            $table->text('description');
            $table->tinyInteger('status')->default('0');
		});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliates');
        Schema::dropIfExists('affiliate_payments');
        Schema::dropIfExists('affiliate_sales');
        Schema::dropIfExists('affiliate_payment_statuses');
        Schema::dropIfExists('affiliate_payment_histories');
        Schema::dropIfExists('affiliate_news');
        Schema::dropIfExists('affiliate_banners');
        Schema::dropIfExists('affiliate_banners_history');
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('affiliate_clicks');




    }
}
