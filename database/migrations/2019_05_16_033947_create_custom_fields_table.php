<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type', 32);
			$table->text('value');
			$table->tinyInteger('required');
			$table->string('location', 32);
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('0');
            $table->string('name');

        });

        Schema::create('custom_field_values', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->smallInteger('position');
            $table->string('name');


		});



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_fields');
        Schema::dropIfExists('custom_field_values');
        
    }
}
