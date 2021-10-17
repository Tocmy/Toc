<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			//$table->bigInteger('tag_id')->unsigned();
            //$table->bigInteger('seo_id')->unsigned();
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
            $table->string('question');
			$table->string('answer');

        });


		Schema::create('faq_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->smallInteger('position');
			$table->string('name');
			$table->tinyInteger('status')->default('1');
			

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('faq_groups');
    }
}
