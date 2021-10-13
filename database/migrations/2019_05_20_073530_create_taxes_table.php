<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('title', 32);
			$table->string('description', 255);
        });
        Schema::create('tax_rates', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 32);
			$table->decimal('rate', 15,4)->default('0.0000');
			$table->tinyInteger('type');
            $table->foreignId('geo_id')->constrained('geos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('customer_group_id')->constrained('customer_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});

		Schema::create('tax_rules', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('based');
			$table->tinyInteger('position');
            $table->foreignId('tax_rate_id')->constrained('tax_rates')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('tax_id')->constrained('taxes')
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
        Schema::dropIfExists('taxes');
        Schema::drop('tax_rules');
		Schema::drop('tax_rates');

    }
}
