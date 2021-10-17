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

        });

        Schema::create('supplier_groups', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('purchase_method', 32);
			$table->tinyInteger('position')->nullable();
            $table->string('name', 32);
			$table->text('description');
			$table->tinyInteger('status')->default('1');

		});


		Schema::create('supplier_settings', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();

			$table->string('setting_title', 64);
			$table->string('setting_key', 64);
			$table->string('setting_description', 255);
			$table->text('setting_value');
			$table->tinyInteger('position')->nullable();

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
        Schema::dropIfExists('supplier_settings');
    }
}
