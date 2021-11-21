<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->string('label_color');
            $table->string('where');
            $table->mediumText('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('repeat', ['yes', 'no'])->default('no');
            $table->integer('repeat_every')->nullable();
            $table->integer('repeat_cycles')->nullable();
            $table->enum('repeat_type', ['day', 'week', 'month', 'year'])->default('day');
            $table->enum('send_reminder', ['yes', 'no'])->default('no')->after('repeat_type');
            $table->integer('remind_time')->nullable()->after('send_reminder');
            $table->enum('remind_type', ['day', 'hour', 'minute'])->default('day')->after('remind_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
