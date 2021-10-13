<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('slug')->index();
			$table->string('name', 255);
			$table->morphs('taggable');
			$table->integer('position')->nullable();
			$table->boolean('suggest')->default(false);
			$table->integer('count')->unsigned()->default('0');
            $table->foreignId('tag_group_id')->constrained('tag_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('tag_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('slug')->index();
			$table->string('name', 255);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_groups');
    }
}
