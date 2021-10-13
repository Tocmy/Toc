<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
			$table->string('account')->unique();
			$table->string('public_id')->unique();
			$table->string('private_id')->unique();
			$table->string('contact');
			$table->string('email')->unique();
			$table->string('url');
			$table->string('remark');
			$table->string('image');
			$table->tinyInteger('position')->nullable();
            $table->tinyInteger('status')->default('1');
            //$table->bigInteger('address_id')->unsigned();
			$table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('supplier_group_id')->constrained('supplier_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('history_id')->constrained('histories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('supplier_groups', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('payment_method_id')->unsigned();
			$table->string('purchase_method', 32);
			$table->tinyInteger('position')->nullable();
            $table->string('name', 32);
			$table->text('description');
			$table->tinyInteger('status')->default('1');
            $table->foreignId('payment_method_id')->constrained('payment_methods')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

		});


		Schema::create('supplier_setting', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('supplier_id')->unsigned();
			$table->bigInteger('setting_id')->unsigned();
			$table->string('setting_title', 64);
			$table->string('setting_key', 64);
			$table->string('setting_description', 255);
			$table->text('setting_value');
			$table->tinyInteger('position')->nullable();
            $table->foreignId('supplier_id')->constrained('suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('setting_id')->constrained('settings')
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
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('supplier_group');
        Schema::dropIfExists('supplier_setting');
    }
}
