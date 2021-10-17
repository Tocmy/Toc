<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoyaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loyalties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->decimal('points', 15,4);
			$table->decimal('pending_points', 15,4);
			$table->string('points_comment');
			$table->tinyInteger('status')->default('1');
            
        });

        Schema::create('loyalty_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->tinyInteger('scope')->default('0');
			$table->integer('scope_id')->unique()->default('0');
			$table->decimal('point_ratio', 15,4);
			$table->decimal('bonus_points', 15,4);
			$table->decimal('redeem_ratio', 15,4);
			$table->decimal('redeem_points', 15,4);
			$table->string('points_type');
			$table->datetime('points_expires');
            $table->boolean('exclude_offer_item')->nullable();
            $table->text('description');
            $table->string('name');
            $table->tinyInteger('status')->default('1');


        });

        Schema::create('loyalty_restricts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->boolean('is_restrict')->default(false);
			$table->string('exclude')->nullable();

		});

        Schema::create('loyalty_redeems', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('redeem_date');
			$table->ipAddress('redeem_ip');

		});

        Schema::create('loyalty_statuses', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->datetime('date');
			$table->decimal('points', 15,4);
			$table->tinyInteger('status')->default('1');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loyalties');
        Schema::dropIfExists('loyalty_groups');
        Schema::dropIfExists('loyalty_restricts');
        Schema::dropIfExists('loyalty_redeems');
        Schema::dropIfExists('loyalty_statuses');
    }
}
