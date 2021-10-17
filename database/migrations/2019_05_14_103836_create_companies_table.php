<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
            $table->string('owner');
            $table->string('website_name');
			$table->string('url');
			$table->string('ssl');
			$table->string('slogan')->nullable();
            $table->string('logo')->nullable();
			$table->string('icon')->nullable();
			$table->string('theme')->nullable();
			$table->string('skype')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook_app_id')->nullable();
		    $table->string('google_maps_key_api')->nullable();
			$table->string('email')->unique();
            $table->string('sales_email');
            $table->string('support_email');
            $table->integer('position');
            $table->tinyInteger('status')->default('0');
			//$table->bigInteger('address_id')->unsigned();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        
    }
}
