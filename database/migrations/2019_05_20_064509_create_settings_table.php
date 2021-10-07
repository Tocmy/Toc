<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('key');
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('value')->nullable();
            $table->text('field');
            $table->tinyInteger('status')->default('1');
            $table->foreignId('setting_group_id')->constrained('setting_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('setting_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title', 64)->nullable();
			$table->string('description')->nullable();
			$table->smallInteger('position');
			$table->tinyInteger('visible')->default('1');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('setting_groups');
    }
}
