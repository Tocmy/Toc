<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('coupons')) {
            Schema::create('coupons', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->string('code')->unique();
                $table->decimal('coupon_discount', 15, 4)->default('0.0000');
                $table->tinyInteger('logged');
                $table->tinyInteger('shipping');
                $table->decimal('total', 15, 4)->default('0.0000');
                $table->datetime('date_start')->nullable();
                $table->datetime('expire_at');
                $table->integer('uses_total');
                $table->string('uses_customer', 11);
                $table->tinyInteger('status')->default('1');
                $table->decimal('min_order', 15, 4)->default('0.0000');
                $table->smallInteger('uses_per_coupon');
                $table->string('name', 64);
                $table->string('descriptions');
                $table->integer('quantity');
                $table->string('image');
            });
        }
        Schema::create('coupon_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('amount', 15, 4)->default('0.0000');
        });

        Schema::create('coupon_redeems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->datetime('redeem_date');
            $table->ipAddress('redeem_ip');
        });

        Schema::create('coupon_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique;
            $table->datetime('date_sent');
        });

        Schema::create('coupon_restrict', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->boolean('is_restrict')->default(false);
            $table->string('exclude')->nullable();
        });
        //how to merge coupon,gift, voucher
        Schema::create('restricts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
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
        


    }
}
