<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
           	$table->string('title',64);
			$table->string('description');
            $table->string('slug');
			$table->bigInteger('seo_id')->unsigned();
			$table->bigInteger('page_group_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
        });

        Schema::create('page_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
           	$table->string('title');
			$table->string('description');
            $table->string('slug');
			$table->bigInteger('parent_id')->unsigned();
			$table->bigInteger('customer_group_id')->unsigned(); //for select certain targeted customer group not allow to info
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('page_groups');
        Schema::dropIfExists('page_store');
    }
}
