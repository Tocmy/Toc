<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
           	$table->string('title',64);
			$table->string('description');
            $table->string('slug');
			$table->foreignId('store_id')->constrained('companies')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('page_group_id')->constrained('page_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('page_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->smallInteger('position');
			$table->tinyInteger('status')->default('1');
           	$table->string('title');
			$table->string('description');
            $table->string('slug');
			$table->foreignId('parent_id')->nullable()
                  ->constrained('page_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('customer_group_id')->constrained('customer_groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); //for select certain targeted customer group not allow to info
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('page_groups');
       
    }
}
