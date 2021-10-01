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
            $table->bigInteger('user_id')->unsigned();
			$table->bigInteger('address_id')->unsigned();
			$table->bigInteger('newsletter_id')->unsigned();
			$table->bigInteger('payment_method_id')->unsigned()->index();
			$table->integer('lifetime');
			$table->bigInteger('commission_id')->unsigned();
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
			$table->bigInteger('affiliate_id')->unsigned();
			$table->decimal('amount', 15,2)->default('0.00');
			$table->decimal('tax', 15,2)->default('0.00');
			$table->decimal('total', 15,2)->default('0.00');
			$table->datetime('payment_date');
			$table->bigInteger('affiliate_payment_status_id')->unsigned();
			$table->bigInteger('address_id')->unsigned();

        });

        Schema::create('affiliate_sales', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('affiliate_id')->unsigned();
			$table->bigInteger('order_id')->unsigned();
			$table->bigInteger('payment_id')->unsigned();
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
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
			$table->tinyInteger('notified');

        });

        Schema::create('affiliate_news', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('news_id')->unsigned();
			$table->bigInteger('affiliate_id')->unsigned();

        });

        Schema::create('affiliate_banners', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('banner_id')->unsigned();


		});

        Schema::create('affiliate_banner_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('affiliate_id')->unsigned();
			$table->bigInteger('banner_history_id')->unsigned();
		});


        Schema::create('affiliate_clicks', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('affiliate_id')->unsigned()->index();
			$table->datetime('client_date');
			$table->string('client_browser');
			$table->string('client_ip');
			$table->string('client_referer');
			$table->integer('click');
			$table->bigInteger('product_id')->unsigned();
			$table->bigInteger('banner_id')->unsigned();
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
		});

        Schema::table('affiliates', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('newsletter_id')->references('id')->on('newsletters')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('cascade')
						->onUpdate('cascade');


        });

        Schema::table('affiliate_payments', function(Blueprint $table) {
			$table->foreign('affiliate_id')->references('id')->on('affiliates')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('affiliate_payment_status_id')->references('id')->on('affiliate_payment_statuses')
						->onDelete('cascade')
						->onUpdate('cascade');

        });

        Schema::table('affiliate_sales', function(Blueprint $table) {
			$table->foreign('affiliate_id')->references('id')->on('affiliates')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('affiliate_payments')
						->onDelete('cascade')
						->onUpdate('cascade');

        });

        Schema::table('affiliate_payment_histories', function(Blueprint $table) {
			$table->foreign('payment_id')->references('id')->on('affiliate_payments')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('history_id')->references('id')->on('histories')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

        Schema::table('affiliate_news', function(Blueprint $table) {
			$table->foreign('news_id')->references('id')->on('news')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

        Schema::table('affiliate_banners', function(Blueprint $table) {
			$table->foreign('banner_id')->references('id')->on('banners')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

        Schema::table('affiliate_banner_histories', function(Blueprint $table) {
			$table->foreign('banner_history_id')->references('id')->on('banner_histories')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')
						->onDelete('cascade')
						->onUpdate('cascade');
        });


        Schema::table('affiliate_clicks', function(Blueprint $table) {
			$table->foreign('banner_id')->references('id')->on('banners')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')
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

        Schema::table('affiliates', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['address_id']);
            $table->dropForeign(['newsletter_id']);
            $table->dropForeign(['payment_method_id']);
            $table->dropForeign(['commission_id']);

        });

        Schema::table('affiliate_payments', function(Blueprint $table) {
            $table->dropForeign(['affiliate_id']);
            $table->dropForeign(['affiliate_payment_status_id']);
            $table->dropForeign(['address_id']);


        });

        Schema::table('affiliate_sales', function(Blueprint $table) {
			$table->dropForeign(['affiliate_id']);
            $table->dropForeign(['order_id']);
            $table->dropForeign(['payment_id']);


        });

        Schema::table('affiliate_payment_histories', function(Blueprint $table) {
            $table->dropForeign(['payment_id']);
            $table->dropForeign(['history_id']);


        });

        Schema::table('affiliate_news', function(Blueprint $table) {
		    $table->dropForeign(['affiliate_id']);
            $table->dropForeign(['news_id']);
        });

        Schema::table('affiliate_banners', function(Blueprint $table) {
            $table->dropForeign(['affiliate_id']);
            $table->dropForeign(['banner_id']);


        });

        Schema::table('affiliate_banner_histories', function(Blueprint $table) {
            $table->dropForeign(['affiliate_id']);
            $table->dropForeign(['banner_history_id']);


		});

        Schema::table('affiliate_clicks', function(Blueprint $table) {
            $table->dropForeign(['affiliate_id']);
            $table->dropForeign(['banner_id']);
            $table->dropForeign(['product_id']);


        });


    }
}
