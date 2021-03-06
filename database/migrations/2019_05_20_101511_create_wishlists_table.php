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
            $table->float('price');
            $table->integer('quantity')->nullable();
            $table->decimal('amount');
           
        });

        Schema::create('wishlist_options', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();


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
