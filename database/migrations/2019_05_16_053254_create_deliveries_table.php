<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     * this is an idea of shipping method.
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->tinyInteger('status');
			$table->boolean('free_shipping');
			$table->boolean('real_time_disabled');
			$table->smallInteger('position');
			$table->integer('type');
			$table->string('name');
			$table->foreignId('carrier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('delivery_cities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('mask', 60);
		    $table->foreignId('delivery_id')->constrained('deliveries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
		});


		Schema::create('delivery_country', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->foreignId('delivery_id')->constrained('deliveries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('country_id')->constrained('countries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
		});
		Schema::create('delivery_postal', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->foreignId('delivery_id')->constrained('deliveries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('postal_id')->constrained('postals')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
			$table->string('mask');
		});

		Schema::create('delivery_states', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->foreignId('delivery_id')->constrained('deliveries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('states_id')->constrained('states')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});

		Schema::create('postals', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('code', 10);
			$table->string('name', 60);
			$table->string('asciiname', 60);
			$table->string('latitude', 2);
			$table->string('longitude', 2);
            $table->foreignId('country_id')->constrained('countries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('state_id')->constrained('states')
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
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('delivery_country');
        Schema::dropIfExists('delivery_states');
        Schema::dropIfExists('delivery_cities');
        Schema::dropIfExists('postals');
        Schema::dropIfExists('delivery_postal');
    }
}
