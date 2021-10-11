<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('vendor');
            $table->string('description')->nullable();
            $table->string('version');
            $table->smallInteger('is_paid')->default(0);
            $table->smallInteger('status')->default(1);
            $table->string('module_type', 50);
            $table->string('icon', 255)->nullable();
            $table->string('update_url', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('contact_email', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
