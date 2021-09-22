<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->bigInteger('product_id')->unsigned();
			$table->decimal('bid_min_increase', 15,4)->default('0.0000');
			$table->datetime('expires_date');
			$table->tinyInteger('status');
			$table->float('overbid_amount', 10,2)->default('0.0000');
			$table->tinyInteger('notified');
			$table->tinyInteger('auction_paid');
			$table->mediumInteger('auctions_nb');
			$table->decimal('auctions_max', 15,4)->default('0.0000');
			$table->mediumInteger('auctions_high_cust');
			$table->tinyInteger('auction_clock');
			$table->decimal('buynow_price', 15,4)->default('0.0000');
			$table->decimal('reserve_price', 15,4)->default('0.0000');
			$table->decimal('start_price', 15,4)->default('0.0000');
			$table->tinyInteger('auction_start');
        });
        Schema::create('bids', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('auction_id')->unsigned();
			$table->bigInteger('customer_id')->unsigned();
			$table->decimal('bid_price', 15,4)->default('0.0000');
			$table->string('bid_status');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
        Schema::dropIfExists('bids');
    }
}
