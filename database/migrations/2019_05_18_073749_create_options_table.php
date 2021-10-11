<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('type_id')->unsigned();
			$table->smallInteger('position');
            $table->string('name');
			$table->string('comment',64);
			$table->text('description',64);
        });

        Schema::create('option_values', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->string('image');
			$table->smallInteger('position');
            $table->string('name');
            $table->foreignId('option_id')->constrained('options')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
        Schema::dropIfExists('option_values');
    }
}
