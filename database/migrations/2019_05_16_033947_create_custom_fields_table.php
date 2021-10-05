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
            $table->foreignId('customer_group_id')->constrained('customer_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('custom_field_values', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->smallInteger('position');
            $table->string('name');
            $table->foreignId('custom_field_id')->constrained('custom_fields')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


		});


        //Schema::table('custom_field_values', function(Blueprint $table) {
            //$table->foreign('custom_field_id')->references('id')->on('custom_fields')
                        //->onDelete('cascade')
                        //->onUpdate('cascade');
           //});

           //Schema::table('custom_field_customer_group', function(Blueprint $table) {
            //$table->foreign('custom_field_id')->references('id')->on('custom_fields')
                        //->onDelete('cascade')
                        //->onUpdate('cascade');
            //$table->foreign('customer_group_id')->references('id')->on('customer_groups')
                        //->onDelete('cascade')
                        //->onUpdate('cascade');

           //});

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
        //Schema::table('custom_field_values', function(Blueprint $table) {
            //$table->dropForeign(['custom_field_id']);
       //});

       //Schema::table('custom_fields', function(Blueprint $table) {
             //$table->dropForeign(['customer_group_id']);

       //});

    }
}
