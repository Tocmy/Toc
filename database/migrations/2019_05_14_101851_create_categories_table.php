<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->bigInteger('parent_id')->unsigned()->nullable();
            $table->bigInteger('_lft')->unsigned()->index();
            $table->bigInteger('_rgt')->unsigned()->index();
			$table->string('images')->nullable();
			$table->integer('position');
			$table->tinyInteger('status')->default('1');
            $table->bigInteger('seo_id')->unsigned();
			$table->string('name');
            $table->string('slug');
			$table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
