<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email-templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('label')->nullable();
            $table->binary('recipient');
            $table->binary('cc')->nullable();
            $table->binary('bcc')->nullable();
            $table->binary('subject');
            $table->string('view', 255);
            $table->binary('variables')->nullable();
            $table->binary('body');
            $table->binary('attachment')->nullable();
            $table->binary('from')->nullable();
            $table->integer('attempts')->default(0);
            $table->boolean('sending')->default(0);
            $table->boolean('failed')->default(0);
            $table->text('error')->nullable();
            $table->boolean('encrypted')->default(0);
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
