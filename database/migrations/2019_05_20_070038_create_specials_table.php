<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('name',20);
			$table->decimal('price', 15,4)->default('0.0000');
			$table->datetime('expire_at');
            $table->datetime('begin_at');
			$table->tinyInteger('status');
            $table->foreignId('product_id')->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('customer_group_id')->constrained('customer_groups')
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
        Schema::dropIfExists('specials');
    }
}
