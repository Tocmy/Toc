<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *ecoomerce backend
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('title', 255);
			$table->string('symbol_left', 12);
			$table->string('symbol_right', 12);
			$table->string('code', 3);
			$table->string('decimal_place');
			$table->float('exchange_rate', 15,8)->nullable()->default(null);
            $table->float('currency_rate', 15,8)->nullable()->default(null);
			$table->string('decimal_point', 3);
            $table->string('thousand_point', 3);
			$table->tinyInteger('status')->default('1');
            $table->tinyInteger('is_default')->unsigned()->default('0');
            $table->boolean('is_cryptocurrency')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
        
    }
}
