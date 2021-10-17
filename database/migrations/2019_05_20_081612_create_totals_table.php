<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('type', 8);
			$table->string('code');
			$table->string('class');
			$table->string('title');
			$table->string('text');
			$table->string('name');
            $table->nullableMorphs('totalable');
			$table->decimal('value', 15,4)->default('0.0000');
			$table->integer('position')->nullable();
			$table->tinyInteger('include');
			$table->tinyInteger('available')->unique();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('totals');

    }
}
