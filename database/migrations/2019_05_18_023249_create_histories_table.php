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
            $table->foreignId('type_id')->constrained('types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });

        Schema::create('types', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
            $table->string('name');
            $table->morphs('typeable');
            $table->tinyInteger('status')->default('1');
            $table->foreignId('parent_id')->constrained('types')
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
        Schema::dropIfExists('histories');
        Schema::dropIfExists('types');
    }
}
