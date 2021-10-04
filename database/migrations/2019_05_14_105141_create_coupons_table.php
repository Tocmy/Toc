<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('code')->unique();
			$table->decimal('coupon_discount', 15,4)->default('0.0000');
			$table->tinyInteger('logged');
			$table->tinyInteger('shipping');
			$table->decimal('total', 15,4)->default('0.0000');
			$table->datetime('date_start')->nullable();
			$table->datetime('expire_at');
			$table->integer('uses_total');
			$table->string('uses_customer', 11);
			$table->tinyInteger('status')->default('1');
			$table->decimal('min_order', 15,4)->default('0.0000');
			$table->smallInteger('uses_per_coupon');
            $table->string('name', 64);
			$table->string('descriptions');
            $table->integer('quantity');
            $table->string('image');
            $table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('setting_id')->constrained('settings')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('coupon_histories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('coupon_id')->unsigned();
			$table->bigInteger('order_id')->unsigned();
			$table->bigInteger('customer_id')->unsigned();
			$table->decimal('amount', 15,4)->default('0.0000');

		});


		Schema::create('coupon_redeems', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('coupon_id')->unsigned();
			$table->bigInteger('customer_id')->unsigned();
			$table->bigInteger('order_id')->unsigned();
			$table->datetime('redeem_date');
			$table->ipAddress('redeem_ip');



		});

		Schema::create('coupon_tracks', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('coupon_id')->unsigned();
			$table->bigInteger('customer_id')->unsigned();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique;
			$table->datetime('date_sent');

		});

		Schema::create('coupon_restrict', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('coupon_id')->unsigned();
			$table->bigInteger('restrict_id')->unsigned();
			$table->boolean('is_restrict')->default(false);
			$table->string('exclude')->nullable();

		});
        //how to merge coupon,gift, voucher
		Schema::create('restricts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('setting_id')->unsigned();
			$table->bigInteger('customer_group_id')->unsigned()->nullable()->index()->default('0');
			$table->bigInteger('category_id')->unsigned()->nullable()->index()->default('0');
			$table->bigInteger('product_id')->unsigned()->nullable()->index()->default('0');
            $table->bigInteger('zone_id')->unsigned()->nullable()->index()->default('0');
			$table->string('name');
			$table->text('description');
		});


        Schema::table('coupon_histories', function(Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


           });

           Schema::table('coupon_redeems', function(Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


           });

           Schema::table('coupon_tracks', function(Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


           });


           Schema::table('coupon_restrict', function(Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('restrict_id')->references('id')->on('restricts')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');


           });

           Schema::table('restricts', function(Blueprint $table) {
            $table->foreign('customer_group_id')->references('id')->on('customer_groups')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('setting_id')->references('id')->on('settings')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')
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
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupon_histories');
        Schema::dropIfExists('coupon_redeems');
        Schema::dropIfExists('coupon_tracks');
        Schema::dropIfExists('coupon_restrict');
        Schema::dropIfExists('restricts');
        Schema::table('coupons', function(Blueprint $table) {
            $table->dropForeign(['type_id','setting_id']);

        });
           Schema::table('coupon_histories', function(Blueprint $table) {
            $table->dropForeign(['coupon_id','order_id', 'customer_id']);

        });

           Schema::table('coupon_redeems', function(Blueprint $table) {
            $table->dropForeign(['coupon_id', 'order_id', 'customer_id']);

        });

           Schema::table('coupon_tracks', function(Blueprint $table) {
            $table->dropForeign(['coupon_id', 'customer_id']);

         });
           Schema::table('coupon_store', function(Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropForeign(['store_id']);



           });

           Schema::table('coupon_restrict', function(Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropForeign(['restrict_id']);



           });

           Schema::table('restricts', function(Blueprint $table) {
            $table->dropForeign(['customer_group_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_id']);
            $table->dropForeign(['setting_id']);
            $table->dropForeign(['zone_id']);


           });


    }
}
