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
            $table->bigInteger('seo_id')->unsigned()->nullable();
            $table->bigInteger('_lft')->unsigned()->index();
            $table->bigInteger('_rgt')->unsigned()->index();
			$table->string('images')->nullable();
			$table->integer('position');
			$table->tinyInteger('status')->default('1');
            $table->string('name');
            $table->string('slug');
			$table->text('description');
        });

        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('seo_id')->references('id')->on('seos')
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
        Schema::dropIfExists('categories');
        Schema::table('categories', function(Blueprint $table) {
            $table->dropForeign(['parent_id','seo_id']);
            

       });
    }
}
