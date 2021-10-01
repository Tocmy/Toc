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
            $table->string('name');
            $table->string('full_name', 255)->nullable();
            $table->string('capital', 255)->nullable();
            $table->string('citizenship', 255)->nullable();
            $table->unsignedBigInteger('timezone_id')->nullable()->index();
			$table->string('iso_code_2', 2);
			$table->string('iso_numeric', 3);
            $table->string('calling_code', 3)->nullable();
            $table->string('flag', 6)->nullable();
            $table->boolean('eea')->nullable()->default(false);
			$table->tinyInteger('status')->default('1');







        });

        Schema::create('states', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('iso_code');
            $table->string('iso_numeric')->nullable();
            $table->string('calling_code', 5)->nullable();
			$table->string('name',255)->nullable();
            $table->tinyInteger('status')->default('0');
            $table->foreignId('country_id')->constrained('countries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('cities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
            $table->foreignId('state_id')->constrained('states')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

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
			$table->foreignId('country_id')->constrained('countries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('state_id')->constrained('states')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('geo_id')->constrained('geos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});

        Schema::create('locations', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name', 64);
			$table->text('open');
			$table->text('comment');
            $table->string('image')->nullable();
            $table->foreignId('address_id')->constrained('addresses')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('locations')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

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

        Schema::table('addresses', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('cascade')
						->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

        Schema::table('countries', function(Blueprint $table) {
			$table->foreign('timezone_id')->references('id')->on('timezones')
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
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('geos');
        Schema::dropIfExists('zones');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('timezones');
        Schema::table('addresses', function(Blueprint $table) {
			$table->dropForeign(['country_id', 'state_id']);

        });

        Schema::table('countries', function(Blueprint $table) {
			$table->dropForeign(['timezone_id']);
        });

        Schema::table('states', function(Blueprint $table) {
			$table->dropForeign(['country_id']);
        });

        Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign(['state_id']);
        });

        Schema::table('zones', function(Blueprint $table) {
			$table->dropForeign(['state_id', 'geo_id', 'country_id']);

        });
        Schema::table('locations', function(Blueprint $table) {
            $table->dropForeign(['address_id','parent_id']);

        });
    }
}
