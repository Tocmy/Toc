<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			//$table->bigInteger('download_group_id')->unsigned()->index();
			$table->tinyInteger('is_Public')->default('1');
			$table->tinyInteger('is_Embedded')->default('1');
			$table->string('name', 128);
			$table->string('fileName', 255);
			$table->string('extension', 20);
			$table->string('title');
			$table->string('description');
			$table->smallInteger('position');
			$table->integer('allow_Download_Days');
			$table->integer('allow_Download_Count');
			$table->text('filePath');
			$table->string('remaining');
           
        });

        Schema::create('download_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->smallInteger('position');
		});

		Schema::create('groupables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('group_id')->unsigned();
            $table->string('group_type');
            $table->morphs('groupables');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('download_groups');
        Schema::dropIfExists('groupables');

    }
}
