<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->decimal('value', 15,8)->default('0.00000000');
            $table->string('title',32);
			$table->string('unit');
			$table->tinyInteger('is_default')->unsigned()->default('0');
        });

        Schema::create('volumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->decimal('value', 15,8)->default('0.00000000');
            $table->string('title',32);
			$table->string('unit');
			$table->tinyInteger('is_default')->unsigned()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weights');
        Schema::dropIfExists('volumes');
    }
}
