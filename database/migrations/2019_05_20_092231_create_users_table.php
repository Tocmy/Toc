<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->string('name');
            $table->string('firstname', 30)->nullable();
			$table->string('lastname', 30)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('photo')->nullable();
			$table->string('designation');
			$table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
			$table->string('google')->nullable();
            $table->string('description')->nullable();
			$table->tinyInteger('status')->default('1')->unsigned();
			$table->string('slug')->default('')->unique();
            $table->timestamps();
        });

        Schema::create('permissions', function(Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('description')->nullable();
			$table->string('model')->nullable();
		});

		Schema::create('permission_role', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();


		});

		Schema::create('permission_user', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();

        });

		Schema::create('roles', function(Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('description')->nullable();
			$table->integer('level')->default(1);
			$table->boolean('status')->default(1);
			$table->boolean('is_locked')->default(0);
		});
		Schema::create('role_user', function(Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
			$table->timestamps();
			$table->softDeletes();

		});
		Schema::create('confirmations', function(Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
			$table->timestamps();
			$table->string('confirmation_code')->nullable();
			$table->boolean('confirmed')->default(false);
			$table->timestamp('confirmed_at')->nullable();
			$table->boolean('active')->default(true);
			$table->string('locale')->default('');
			$table->string('timezone')->default('');

		});


		Schema::create('securities', function(Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
			$table->timestamps();
			$table->boolean('enable')->default(false);
            $table->string('two_factor_recovery_code')->nullable();
            $table->string('two_factor_secret')->nullable();
            $table->integer('authCount');
            $table->dateTime('authDate')->nullable();
            $table->dateTime('requestDate')->nullable();



        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('socials', function (Blueprint $table) {
			$table->bigIncrements('id')->unsigned();
			$table->string('provider', 32);
			$table->string('provider_id');
			$table->string('token')->nullable();
			$table->string('image')->nullable();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('confirmations');
        Schema::dropIfExists('securities');
        Schema::dropIfExists('password_resets');
       

    }

}
