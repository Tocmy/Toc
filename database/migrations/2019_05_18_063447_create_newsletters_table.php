<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->string('title');
			$table->text('content');
			$table->datetime('sent');
			$table->tinyInteger('status')->default('0');
			$table->tinyInteger('locked')->default('0');
			$table->text('header');
			$table->datetime('schedule');
			$table->smallInteger('position');
			$table->longText('unsubscribe');
			$table->string('unsubscribe_link');



        });

        Schema::create('subscribers', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->boolean('approved')->default(true);
			$table->string('email')->unique()->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('confirmation_code', 40);
			$table->tinyInteger('blacklist')->default('0');
		});


		Schema::create('campaigns', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('subject');
			$table->integer('api_campaign_id')->unique();
			$table->tinyInteger('status');
			$table->datetime('send_at');
			$table->string('name');
			$table->text('description')->nullable();
			$table->boolean('is_scheduled')->default(false);
			$table->datetime('scheduled_for');
			$table->boolean('is_sent')->default(false);
			$table->datetime('sent_at');
			$table->integer('sent_count');
			$table->text('attachments')->nullable();

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletters');
        Schema::dropIfExists('subscribers');
        Schema::dropIfExists('campaigns');
    }
}
