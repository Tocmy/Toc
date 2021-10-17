<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->tinyInteger('notify');
			$table->text('comment')->nullable();
			$table->tinyInteger('status')->default('1');


        });
        //seo/laravel-boilaplate or bromcrm
        Schema::create('audits', function(Blueprint $table) {
		    	$table->bigIncrements('id');
		    	$table->string('user_name', 255)->nullable();
				$table->enum('name', ['created','updated','removed']);
				$table->string('table', 255);
				$table->text('url');
				$table->string('ip', 124);
				$table->string('user_agent', 255);
				$table->longText('old_value');
				$table->longText('new_value');
				$table->integer('flags')->nullable();
				$table->timestamps();
				$table->softDeletes();

				$table->index(['name','deleted_at']);

		});
        Schema::create('types', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
            $table->string('name');
            $table->morphs('typeable');
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
        Schema::dropIfExists('histories');
        Schema::dropIfExists('types');
        Schema::dropIfExists('audits');
    }
}
