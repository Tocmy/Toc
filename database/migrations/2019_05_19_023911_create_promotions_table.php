<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->tinyInteger('status')->default('0');
			$table->smallInteger('position');
            $table->string('code', 64)->unique();
            $table->string('name');
			$table->string('slug');
			$table->text('description');
			$table->string('image');
            $table->double('reward', 10, 2)->nullable();
			$table->boolean('is_used')->default(false);
            $table->datetime('date_start')->nullable();
			$table->datetime('expire_at');
            $table->foreignId('product_id')->constrained('products')
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
        Schema::dropIfExists('promotions');
    }
}
