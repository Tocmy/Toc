<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
			$table->tinyInteger('customer_type');
			$table->string('name');
			$table->string('first_name', 30)->nullable();
			$table->string('last_name', 30)->nullable();
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken('rememberToken');
			$table->string('image')->nullable();
			$table->string('designation');
			$table->string('description')->nullable();
			$table->ipAddress('ip');
			$table->tinyInteger('status')->default('1');
			$table->tinyInteger('approved');
			$table->tinyInteger('terms');
			$table->string('slug');
			$table->date('birthday')->nullable();
            $table->char('gender', 1)->nullable();
            $table->foreignId('customer_group_id')->constrained('customer_groups')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('store_id')->constrained('companies')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');

        });
        Schema::create('customer_baskets', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->float('quantity', 10,2)->nullable();
			$table->decimal('amount', 15,4)->default('0.0000')->nullable();
			$table->date('date_added');
			$table->text('description');
            $table->foreignId('customer_id')->constrained('customers')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
		});
		Schema::create('customer_basket_attributes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('text', 32);
            $table->foreignId('customer_basket_id')->constrained('customer_baskets')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('option_id')->constrained('options')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('option_value_id')->constrained('option_values')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
		});


		Schema::create('customer_fields', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name');
			$table->text('value');
			$table->integer('position');
            $table->foreignId('customer_id')->constrained('customers')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('custom_field_id')->constrained('custom_fields')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('custom_field_value_id')->constrained('custom_field_values')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');


		});
		Schema::create('customer_groups', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->tinyInteger('group_type');
			$table->tinyInteger('group_discount');
			$table->text('description');
			$table->boolean('approval');
			$table->integer('position');
			//from setting
			$table->tinyInteger('company_id_display')->default(0);
			$table->tinyInteger('company_id_required')->default(0);
			$table->tinyInteger('tax_id_display')->default(0);
			$table->tinyInteger('tax_id_required')->default(0);
			$table->string('payment_allowed',255);
			$table->string('payment_terms',255);
			$table->string('shipment_allowed',255);
            $table->string('taxes_exempt',255);
			$table->string('order_total_allowed',255);
			$table->foreignId('setting_id')->constrained('settings')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');


		});
		//drop this Table pivot
		Schema::create('customer_histories', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('customer_id')->unsigned();
			$table->bigInteger('history_id')->unsigned();

		});
		Schema::create('customer_ips', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('ip', 40);
			$table->boolean('block_ip');
			$table->string('to_ip', 32);
			$table->string('from_ip', 32);
            $table->foreignId('customer_id')->constrained('customers')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
		});
		Schema::create('customer_onlines', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('first_name');
			$table->string('ip_address');
			$table->string('hostname');
			$table->string('country_code', 2);
			$table->string('country_name');
			$table->string('region', 64);
			$table->string('city', 64);
			$table->float('latitute');
			$table->float('longtitude');
			$table->time('time_entry');
			$table->time('time_last_click');
			$table->string('referrer');
			$table->string('agent');
            $table->foreignId('customer_id')->constrained('customers')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
		});

        Schema::create('customer_bans', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
            $table->softDeletes();
			$table->morphs('bannable');
            $table->text('comment')->nullable();
            $table->timestamp('expired_at')->nullable()->index();
            $table->foreignId('customer_id')->constrained('customers')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');

		});






           Schema::table('customer_histories', function(Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('history_id')->references('id')->on('histories')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
           });








    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_baskets');
        Schema::dropIfExists('customer_basket_attributes');
        Schema::dropIfExists('customer_fields');
        Schema::dropIfExists('customer_groups');
        Schema::dropIfExists('customer_histories');
        Schema::dropIfExists('customer_ips');
        Schema::dropIfExists('customer_bans');
        Schema::dropIfExists('customer_onlines');
        Schema::table('customers', function(Blueprint $table) {
            $table->dropForeign(['customer_group_id', 'store_id', 'user_id', 'payment_method_id']);

           });

           Schema::table('customer_baskets', function(Blueprint $table) {

            $table->dropForeign(['customer_id', 'product_id']);

           });
           Schema::table('customer_basket_attributes', function(Blueprint $table) {

            $table->dropForeign(['customer_basket_id','option_id', 'option_value_id']);

           });

           Schema::table('customer_fields', function(Blueprint $table) {

            $table->dropForeign(['customer_id','custom_field_value_id','custom_field_id']);


           });

           Schema::table('customer_groups', function(Blueprint $table) {
            $table->dropForeign(['setting_id']);

           });

           Schema::table('customer_histories', function(Blueprint $table) {
            $table->dropForeign(['customer_id','history_id' ]);
            
           });

           Schema::table('customer_ips', function(Blueprint $table) {
             $table->dropForeign(['customer_id']);
           });

           Schema::table('customer_onlines', function(Blueprint $table) {
              $table->dropForeign(['customer_id']);
           });

           Schema::table('customer_bans', function(Blueprint $table) {
                $table->dropForeign(['customer_id']);
           });

    }
}
