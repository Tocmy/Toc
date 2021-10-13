<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->foreignId('customer_id')->constrained('customers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


        });

        Schema::create('wishlist_options', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			
            $table->foreignId('wishlist_id')->constrained('wishlits')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('option_id')->constrained('options')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('option_value_id')->constrained('option_values')
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
        Schema::dropIfExists('wishlists');
        Schema::dropIfExists('wishlist_options');
    }
}
