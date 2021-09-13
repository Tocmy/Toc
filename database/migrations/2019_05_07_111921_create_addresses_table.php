<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('country_id')->unsigned()->index();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->morphs('addressable');
            $table->string('address_type')->default('Primary')->nullable();
			$table->string('company');
			$table->string('company_id', 32)->unique();
			$table->string('tax_id', 32)->unique();
			$table->string('address_1', 128);
			$table->string('address_2', 128);
			$table->tinyInteger('postcode_required')->default('0');
			$table->string('postcode', 10);
			$table->string('telephone', 32);
			$table->string('fax', 32);
            $table->string('mobile', 32);
			$table->string('latitude', 32);
            $table->string('longitude', 32);


        });
        Schema::create('countries', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('iso_code_2', 2);
			$table->string('iso_code_3', 3);
			$table->tinyInteger('status')->default('1');
			$table->string('calling_code', 3)->nullable();
            $table->string('name');

        });

        Schema::create('states', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('country_id')->unsigned();
			$table->string('code', 32);
			$table->string('name',255);
            $table->tinyInteger('status')->default('0');

        });

        Schema::create('cities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('state_id')->unsigned();
            $table->string('name');

        });

        Schema::create('geos', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 32);
			$table->string('description');
		});

		Schema::create('zones', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('country_id')->unsigned();
			$table->bigInteger('state_id')->unsigned();
            $table->bigInteger('geo_id')->unsigned();


		});

        Schema::create('locations', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('name', 64);
			$table->bigInteger('address_id')->unsigned();
			$table->text('open');
			$table->text('comment');
            $table->string('image')->nullable();

		});

        Schema::create('timezones', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('value')->nullable();
            $table->string('abbr')->nullable();
            $table->integer('offset')->nullable();
            $table->string('text')->nullable();
            $table->string('utc')->nullable();
            $table->boolean('dst')->nullable()->default(false);

		});



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('geos');
        Schema::dropIfExists('zones');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('timezones');
    }
}
