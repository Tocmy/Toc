<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table
                ->bigInteger('country_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('state_id')
                ->unsigned()
                ->index();
            $table->bigInteger('city_id')->unsigned();
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table
                ->bigInteger('timezone_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('timezone_id')
                ->references('id')
                ->on('timezones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->bigInteger('country_id')->unsigned();
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->bigInteger('state_id')->unsigned();
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('zones', function (Blueprint $table) {
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('geo_id')->unsigned();
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('geo_id')
                ->references('id')
                ->on('geos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliates', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('newsletter_id')->unsigned();
            $table
                ->bigInteger('payment_method_id')
                ->unsigned()
                ->index();
            $table->bigInteger('commission_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('newsletter_id')
                ->references('id')
                ->on('newsletters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('commission_id')
                ->references('id')
                ->on('commissions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_payments', function (Blueprint $table) {
            $table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('affiliate_payment_status_id')->unsigned();
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('affiliate_payment_status_id')
                ->references('id')
                ->on('affiliate_payment_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_sales', function (Blueprint $table) {
            $table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('payment_id')
                ->references('id')
                ->on('affiliate_payments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_payment_histories', function (
            Blueprint $table
        ) {
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table
                ->foreign('payment_id')
                ->references('id')
                ->on('affiliate_payments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_news', function (Blueprint $table) {
            $table->bigInteger('news_id')->unsigned();
            $table->bigInteger('affiliate_id')->unsigned();
            $table
                ->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_banners', function (Blueprint $table) {
            $table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('banner_id')->unsigned();

            $table
                ->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_banner_histories', function (
            Blueprint $table
        ) {
            $table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('banner_history_id')->unsigned();
            $table
                ->foreign('banner_history_id')
                ->references('id')
                ->on('banner_histories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('affiliate_clicks', function (Blueprint $table) {
            $table
                ->bigInteger('affiliate_id')
                ->unsigned()
                ->index();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('banner_id')->unsigned();
            $table
                ->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //article
        Schema::table('articles', function (Blueprint $table) {
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('extra_id')->unsigned();
            $table
                ->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('extra_id')
                ->references('id')
                ->on('article_description_extras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('article_relateds', function (Blueprint $table) {
            $table->bigInteger('article_id')->unsigned();
            $table
                ->bigInteger('related_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('related_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('article_topic', function (Blueprint $table) {
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();
            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('topic_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('reply_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('reply_id')
                ->references('id')
                ->on('comments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //attribute
        Schema::table('attributes', function (Blueprint $table) {
            $table->bigInteger('attribute_group_id')->unsigned();
            $table
                ->foreign('attribute_group_id')
                ->references('id')
                ->on('attribute_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //auction
        Schema::table('auctions', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('bids', function (Blueprint $table) {
            $table->bigInteger('auction_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('auction_id')
                ->references('id')
                ->on('auctions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        //banner
        Schema::table('banners', function (Blueprint $table) {
            $table->bigInteger('banner_group_id')->unsigned();
            $table
                ->foreign('banner_group_id')
                ->references('id')
                ->on('banner_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('banner_histories', function (Blueprint $table) {
            $table->bigInteger('banner_id')->unsigned();
            $table
                ->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //barcode
        Schema::table('barcodes', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('printers', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //brand
        Schema::table('brands', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //category
        Schema::table('categories', function (Blueprint $table) {
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('parent_id')
                ->nullable()
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //companies
        Schema::table('companies', function (Blueprint $table) {
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('coupon_histories', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('coupon_redeems', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('coupon_tracks', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('coupon_restrict', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->unsigned();
            $table->bigInteger('restrict_id')->unsigned();
            $table
                ->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('restrict_id')
                ->references('id')
                ->on('restricts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('restricts', function (Blueprint $table) {
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->bigInteger('customer_group_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->default('0');
            $table
                ->bigInteger('category_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->default('0');
            $table
                ->bigInteger('product_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->default('0');
            $table
                ->bigInteger('zone_id')
                ->unsigned()
                ->nullable()
                ->index()
                ->default('0');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('zone_id')
                ->references('id')
                ->on('zones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table
                ->bigInteger('customer_group_id')
                ->unsigned()
                ->index();
            $table->bigInteger('payment_method_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_baskets', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_basket_attributes', function (
            Blueprint $table
        ) {
            $table->bigInteger('customer_basket_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('option_value_id')->unsigned();
            $table
                ->foreign('customer_basket_id')
                ->references('id')
                ->on('customer_baskets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_value_id')
                ->references('id')
                ->on('option_values')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_fields', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('custom_field_value_id')->unsigned();
            $table->bigInteger('custom_field_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('custom_field_id')
                ->references('id')
                ->on('custom_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('custom_field_value_id')
                ->references('id')
                ->on('custom_field_values')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_groups', function (Blueprint $table) {
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_histories', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_ips', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('customer_onlines', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('customer_bans', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->bigInteger('period_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('period_id')
                ->references('id')
                ->on('periods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('contract_plans', function (Blueprint $table) {
            $table->bigInteger('contract_id')->unsigned();
            $table
                ->foreign('contract_id')
                ->references('id')
                ->on('contracts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('custom_fields', function (Blueprint $table) {
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('custom_field_values', function (Blueprint $table) {
            $table->bigInteger('custom_field_id')->unsigned();
            $table
                ->foreign('custom_field_id')
                ->references('id')
                ->on('custom_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('currencies', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('combos', function (Blueprint $table) {
            $table->bigInteger('discount_id')->unsigned();
            $table
                ->bigInteger('subproduct_id')
                ->unsigned()
                ->nullable();
            $table
                ->bigInteger('product_id')
                ->unsigned()
                ->nullable();
            $table
                ->bigInteger('category_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('subproduct_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('discount_id')
                ->references('id')
                ->on('discounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table
                ->bigInteger('download_group_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('download_group_id')
                ->references('id')
                ->on('download_groups')
                ->onDelete('cascade');
        });
        //deliveries
        Schema::table('deliveries', function (Blueprint $table) {
            $table->bigInteger('carrier_id')->unsigned();
            $table
                ->foreign('carrier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('delivery_cities', function (Blueprint $table) {
            $table->bigInteger('delivery_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table
                ->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('delivery_country', function (Blueprint $table) {
            $table->bigInteger('delivery_id')->unsigned();
            $table->bigInteger('country_id')->unsigned();
            $table
                ->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('delivery_postal', function (Blueprint $table) {
            $table->bigInteger('delivery_id')->unsigned();
            $table->bigInteger('postal_id')->unsigned();
            $table
                ->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('postal_id')
                ->references('id')
                ->on('postals')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('delivery_states', function (Blueprint $table) {
            $table->bigInteger('delivery_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table
                ->foreign('delivery_id')
                ->references('id')
                ->on('deliveries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('postals', function (Blueprint $table) {
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table
                ->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->bigInteger('faq_group_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('faq_group_id')
                ->references('id')
                ->on('faq_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('faq_groups', function (Blueprint $table) {
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->nullable()
                ->index();
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('faq_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('features', function (Blueprint $table) {
            $table
                ->bigInteger('product_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned();
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('types', function (Blueprint $table) {
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('audits', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('insurances', function (Blueprint $table) {
            $table->bigInteger('shipping_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('tax_id')->unsigned();
            $table->bigInteger('insurance_rate_id')->unsigned();
            $table->bigInteger('insurance_rule_id')->unsigned();
            $table
                ->foreign('shipping_id')
                ->references('id')
                ->on('shippings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('insurance_rate_id')
                ->references('id')
                ->on('insurance_rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('insurance_rule_id')
                ->references('id')
                ->on('insurance_rules')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('insurance_rates', function (Blueprint $table) {
            $table->bigInteger('geo_id')->unsigned();
            $table
                ->foreign('geo_id')
                ->references('id')
                ->on('geos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('order_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('currency_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('customer_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('history_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('status_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('invoice_payments', function (Blueprint $table) {
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('payment_method_id')->unsigned();
            $table->biginteger('currency_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('Payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('loyalties', function (Blueprint $table) {
            $table
                ->bigInteger('customer_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('order_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();

            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('loyalty_groups', function (Blueprint $table) {
            $table
                ->bigInteger('product_id')
                ->unsigned()
                ->index();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->bigInteger('customer_group_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('loyalty_restricts', function (Blueprint $table) {
            $table->bigInteger('loyalty_group_id')->unsigned();
            $table->bigInteger('restrict_id')->unsigned();
            $table
                ->foreign('loyalty_group_id')
                ->references('id')
                ->on('loyalty_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('restrict_id')
                ->references('id')
                ->on('restricts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('loyalty_redeems', function (Blueprint $table) {
            $table->bigInteger('loyalty_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('loyalty_id')
                ->references('id')
                ->on('loyalties')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('loyalty_statuses', function (Blueprint $table) {
            $table->bigInteger('loyalty_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table
                ->bigInteger('customer_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('loyalty_id')
                ->references('id')
                ->on('loyalties')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('newsletters', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('subscriber_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('subscriber_id')
                ->references('id')
                ->on('subscribers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('options', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned();
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('option_values', function (Blueprint $table) {
            $table->bigInteger('option_id')->unsigned();
            $table
                ->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('customer_group_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('affiliate_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('payment_method_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('affiliate_id')
                ->references('id')
                ->on('affiliates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_exchanges', function (Blueprint $table) {
            $table->bigInteger('rma_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_exchange_id')->unsigned();
            $table
                ->foreign('rma_id')
                ->references('id')
                ->on('rmas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_exchange_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_downloads', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('download_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('download_id')
                ->references('id')
                ->on('downloads')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_history', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('order_options', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('order_product_id')->unsigned();
            $table->bigInteger('product_option_id')->unsigned();
            $table->bigInteger('product_option_value_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('order_product_id')
                ->references('id')
                ->on('order_products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('product_option_id')
                ->references('id')
                ->on('product_options')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('product_option_value_id')
                ->references('id')
                ->on('product_option_values')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('order_products', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_recurrences', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('order_recurrence_transactions', function (
            Blueprint $table
        ) {
            $table->bigInteger('order_recurrence_id')->unsigned();
            $table
                ->foreign('order_recurrence_id')
                ->references('id')
                ->on('order_recurrences')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_surcharges', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_voucher', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('voucher_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('voucher_id')
                ->references('id')
                ->on('vouchers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_custom_fields', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('custom_field_id')->unsigned();
            $table->bigInteger('custom_field_value_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('custom_field_id')
                ->references('id')
                ->on('custom_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('custom_field_value_id')
                ->references('id')
                ->on('custom_field_values')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('order_shippings', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('shipping_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('shipping_id')
                ->references('id')
                ->on('shippings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_types', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('order_frauds', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->bigInteger('page_group_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('page_group_id')
                ->references('id')
                ->on('page_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('page_groups', function (Blueprint $table) {
            $table
                ->bigInteger('parent_id')
                ->unsigned()
                ->nullable();
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('page_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade'); //for select certain targeted customer group not allow to info
        });

        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('length_id')->unsigned();
            $table->bigInteger('weight_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('tax_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('length_id')
                ->references('id')
                ->on('lengths')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('weight_id')
                ->references('id')
                ->on('weights')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('product_groups', function (Blueprint $table) {
            $table->bigInteger('setting_id')->unsigned();
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_shippings', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('method_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('method_id')
                ->references('id')
                ->on('shippings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_relateds', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table
                ->bigInteger('related_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('related_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_profiles', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('product_options', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('product_option_values', function (Blueprint $table) {
            $table->bigInteger('product_option_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table
                ->bigInteger('option_value_id')
                ->unsigned()
                ->default('0');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_option_id')
                ->references('id')
                ->on('product_options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_value_id')
                ->references('id')
                ->on('option_values')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('product_location', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_discounts', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('discount_id')->unsigned();
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('discount_id')
                ->references('id')
                ->on('discounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('discounts', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_colours', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('surface_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('surface_id')
                ->references('id')
                ->on('surfaces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('attribute_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('price_groups', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('surfaces', function (Blueprint $table) {
            $table->bigInteger('colour_id')->unsigned();
            $table
                ->foreign('colour_id')
                ->references('id')
                ->on('colours')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table ->bigInteger('brand_id')
                ->unsigned()
                ->index();
            $table ->bigInteger('supplier_id')
                ->unsigned()
                ->index();
            $table ->bigInteger('tax_id')
                ->unsigned()
                ->index();
            $table ->bigInteger('product_id')
                ->unsigned()
                ->index();
            $table->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table->bigInteger('currency_id')
                ->unsigned()
                ->index();
            $table->bigInteger('length_id')->unsigned();
            $table->bigInteger('weight_id')->unsigned();
            $table
                ->foreign('length_id')
                ->references('id')
                ->on('lengths')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('weight_id')
                ->references('id')
                ->on('weights')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('purchase_attributes', function (Blueprint $table) {
            $table->bigInteger('purchase_id')->unsigned();
            $table->bigInteger('attribute_id')->unsigned();
            $table
                ->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->bigInteger('purchase_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        //whose can perform the purchase, it nessacry?
        Schema::table('stock_receives', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('purchase_id')->unsigned();
            $table->bigInteger('stock_id')->unsigned();

            $table
                ->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('stock_id')
                ->references('id')
                ->on('stocks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('payment_method_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('supplier_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('currency_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table
                ->bigInteger('module_id')
                ->unique()
                ->unsigned();
            $table
                ->bigInteger('merchant_id')
                ->unique()
                ->unsigned();
            $table
                ->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('merchant_id')
                ->references('id')
                ->on('merchants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('payment_settings', function (Blueprint $table) {
            $table->bigInteger('payment_method_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //provice service provice details
        Schema::table('merchants', function (Blueprint $table) {
            $table->bigInteger('supplier_id')->unsigned();
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('wallets', function (Blueprint $table) {
            $table ->bigInteger('customer_id')
                ->unsigned()
                ->nullable();
            $table ->bigInteger('currency_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->nullable()
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //emart
        Schema::table('wallet_histories', function (Blueprint $table) {
            $table->bigInteger('wallet_id')->unsigned();
            $table
                ->foreign('wallet_id')
                ->references('id')
                ->on('wallets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('quotations', function (Blueprint $table) {
            $table
                ->bigInteger('customer_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table->bigInteger('tax_id')->unsigned();
            $table->bigInteger('requote_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('requote_id')
                ->references('id')
                ->on('quotations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('quotation_products', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('quote_id')->unsigned();
            $table
                ->foreign('quote_id')
                ->references('id')
                ->on('quotations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('rmas', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('rma_reason_id')->unsigned();
            $table->bigInteger('rma_action_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('rma_reason_id')
                ->references('id')
                ->on('rma_reasons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('rma_action_id')
                ->references('id')
                ->on('rma_actions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('rma_products', function (Blueprint $table) {
            $table->bigInteger('rma_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('rma_id')
                ->references('id')
                ->on('rmas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->bigInteger('rma_id')->unsigned();
            $table
                ->bigInteger('payment_method_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('rma_id')
                ->references('id')
                ->on('rmas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('rating_types', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('rating_summaries', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('rating_type_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('rating_type_id')
                ->references('id')
                ->on('rating_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('ratings', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('review_id')->unsigned();
            $table->bigInteger('rating_type_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('rating_type_id')
                ->references('id')
                ->on('rating_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->bigInteger('history_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->bigInteger('supplier_group_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_group_id')
                ->references('id')
                ->on('supplier_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('supplier_groups', function (Blueprint $table) {
            $table->bigInteger('payment_method_id')->unsigned();
            $table
                ->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('supplier_settings', function (Blueprint $table) {
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('tax_rate_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('history_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_rate_id')
                ->references('id')
                ->on('tax_rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('history_id')
                ->references('id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('service_actions', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('priority_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('priority_id')
                ->references('id')
                ->on('priorities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('service_options', function (Blueprint $table) {
            $table->bigInteger('service_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        //consider related purchase order, status to reflect the availability of the part
        Schema::table('service_parts', function (Blueprint $table) {
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('service_shippings', function (Blueprint $table) {
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('package_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('service_types', function (Blueprint $table) {
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('contract_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('contract_id')
                ->references('id')
                ->on('contracts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('service_warranty', function (Blueprint $table) {
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('warranty_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('warranty_id')
                ->references('id')
                ->on('warranties')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('order_service', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('shippings', function (Blueprint $table) {
            $table
                ->bigInteger('module_id')
                ->unique()
                ->unsigned();
            $table
                ->bigInteger('supplier_id')
                ->unique()
                ->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


        Schema::table('carriers', function (Blueprint $table) {

            $table
                ->bigInteger('supplier_id')
                ->unique()
                ->unsigned();

            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });






        Schema::table('shipping_markups', function (Blueprint $table) {
            $table->bigInteger('shipping_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table
                ->foreign('shipping_id')
                ->references('id')
                ->on('shippings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('shipping_rates', function (Blueprint $table) {
            //carrier_id ==>double check
            $table->bigInteger('shipping_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('weight_id')->unsigned();
            $table->bigInteger('length_id')->unsigned();
            $table->bigInteger('geo_id')->unsigned();
            $table->bigInteger('surcharge_id')->unsigned();
            $table->bigInteger('tax_rate_id')->unsigned();
            $table
                ->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('shipping_id')
                ->references('id')
                ->on('shippings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('weight_id')
                ->references('id')
                ->on('weights')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('length_id')
                ->references('id')
                ->on('lengths')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('geo_id')
                ->references('id')
                ->on('geos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('surcharge_id')
                ->references('id')
                ->on('surcharges')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_rate_id')
                ->references('id')
                ->on('tax_rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->bigInteger('setting_group_id')->unsigned();
            $table
                ->foreign('setting_group_id')
                ->references('id')
                ->on('setting_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('specials', function (Blueprint $table) {
            $table->bigInteger('customer_group_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('tags', function (Blueprint $table) {
            $table
                ->bigInteger('tag_group_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('tag_group_id')
                ->references('id')
                ->on('tag_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('tax_rates', function (Blueprint $table) {
            $table
                ->bigInteger('geo_id')
                ->unsigned()
                ->index();
            $table->bigInteger('customer_group_id')->unsigned();
            $table
                ->foreign('geo_id')
                ->references('id')
                ->on('geos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('tax_rules', function (Blueprint $table) {
            $table->bigInteger('tax_rate_id')->unsigned();
            $table->bigInteger('tax_id')->unsigned();
            $table
                ->foreign('tax_rate_id')
                ->references('id')
                ->on('tax_rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table
                ->bigInteger('permission_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('role_id')
                ->unsigned()
                ->index();

            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('permission_user', function (Blueprint $table) {
            $table
                ->bigInteger('permission_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->bigInteger('role_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('confirmations', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('securities', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('socials', function (Blueprint $table) {
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->bigInteger('theme_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();

            $table
                ->foreign('store_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('theme_id')
                ->references('id')
                ->on('voucher_contents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('voucher_histories', function (Blueprint $table) {
            $table->bigInteger('voucher_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('voucher_id')
                ->references('id')
                ->on('vouchers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('basket_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('basket_id')
                ->references('id')
                ->on('customer_baskets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('wishlist_options', function (Blueprint $table) {
            $table->bigInteger('wishlist_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('option_value_id')->unsigned();

            $table
                ->foreign('wishlist_id')
                ->references('id')
                ->on('wishlists')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('option_value_id')
                ->references('id')
                ->on('option_values')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('warranties', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned();
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        //customer purchase extend warranty .
        Schema::table('warranty_orders', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('warranty_products', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('warranty_id')->unsigned();
            $table
                ->bigInteger('product_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('warranty_id')
                ->references('id')
                ->on('warranties')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['country_id', 'state_id', 'city_id']);
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign(['timezone_id']);
        });

        Schema::table('states', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
        });

        Schema::table('zones', function (Blueprint $table) {
            $table->dropForeign(['state_id', 'geo_id', 'country_id']);
        });
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropForeign([
                'user_id',
                'newsletter_id',
                'payment_method_id',
                'commission_id',
            ]);
        });

        Schema::table('affiliate_payments', function (Blueprint $table) {
            $table->dropForeign([
                'affiliate_id',
                'affiliate_payment_status_id',
            ]);
        });

        Schema::table('affiliate_sales', function (Blueprint $table) {
            $table->dropForeign(['affiliate_id', 'order_id', 'payment_id']);
        });

        Schema::table('affiliate_payment_histories', function (
            Blueprint $table
        ) {
            $table->dropForeign(['payment_id', 'history_id']);
        });

        Schema::table('affiliate_news', function (Blueprint $table) {
            $table->dropForeign(['affiliate_id', 'news_id']);
        });

        Schema::table('affiliate_banners', function (Blueprint $table) {
            $table->dropForeign(['affiliate_id', 'banner_id']);
        });

        Schema::table('affiliate_banner_histories', function (
            Blueprint $table
        ) {
            $table->dropForeign(['affiliate_id', 'banner_history_id']);
        });

        Schema::table('affiliate_clicks', function (Blueprint $table) {
            $table->dropForeign(['affiliate_id', 'banner_id', 'product_id']);
        });
        //article
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign([
                'author_id',
                'store_id',
                'product_id',
                'extra_id',
            ]);
        });

        Schema::table('article_relateds', function (Blueprint $table) {
            $table->dropForeign(['article_id', 'related_id']);
        });

        Schema::table('article_topic', function (Blueprint $table) {
            $table->dropForeign(['article_id', 'topic_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign([
                'article_id',
                'reply_id',
                'customer_id',
                'author_id',
            ]);
        });
        //attribute
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropForeign(['attribute_group_id']);
        });
        //auction
        Schema::table('auctions', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'store_id']);
        });
        Schema::table('bids', function (Blueprint $table) {
            $table->dropForeign(['auction_id', 'customer_id']);
        });
        //banner
        Schema::table('banners', function (Blueprint $table) {
            $table->dropForeign(['banner_group_id']);
        });

        Schema::table('banner_histories', function (Blueprint $table) {
            $table->dropForeign(['banner_id']);
        });
        //barcode
        Schema::table('barcodes', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
        });

        Schema::table('printers', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['setting_id']);
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropForeign(['type_id', 'setting_id', 'store_id']);
        });
        Schema::table('coupon_histories', function (Blueprint $table) {
            $table->dropForeign(['coupon_id', 'order_id', 'customer_id']);
        });

        Schema::table('coupon_redeems', function (Blueprint $table) {
            $table->dropForeign(['coupon_id', 'order_id', 'customer_id']);
        });

        Schema::table('coupon_tracks', function (Blueprint $table) {
            $table->dropForeign(['coupon_id', 'customer_id']);
        });

        Schema::table('coupon_restrict', function (Blueprint $table) {
            $table->dropForeign(['coupon_id', 'restrict_id']);
        });

        Schema::table('restricts', function (Blueprint $table) {
            $table->dropForeign([
                'customer_group_id',
                'category_id',
                'product_id',
                'setting_id',
                'zone_id',
            ]);
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign([
                'customer_group_id',
                'store_id',
                'user_id',
                'payment_method_id',
            ]);
        });

        Schema::table('customer_baskets', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'product_id']);
        });
        Schema::table('customer_basket_attributes', function (
            Blueprint $table
        ) {
            $table->dropForeign([
                'customer_basket_id',
                'option_id',
                'option_value_id',
            ]);
        });

        Schema::table('customer_fields', function (Blueprint $table) {
            $table->dropForeign([
                'customer_id',
                'custom_field_value_id',
                'custom_field_id',
            ]);
        });

        Schema::table('customer_groups', function (Blueprint $table) {
            $table->dropForeign(['setting_id']);
        });

        Schema::table('customer_histories', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'history_id']);
        });

        Schema::table('customer_ips', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('customer_onlines', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('customer_bans', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign(['period_id', 'customer_id', 'store_id']);
        });

        Schema::table('contract_plans', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
        });

        Schema::table('custom_field_values', function (Blueprint $table) {
            $table->dropForeign(['custom_field_id']);
        });

        Schema::table('custom_fields', function (Blueprint $table) {
            $table->dropForeign(['customer_group_id']);
        });

        Schema::table('currencies', function (Blueprint $table) {
            $table->dropForeign(['store_id', 'setting_id']);
        });
        Schema::table('combos', function (Blueprint $table) {
            $table->dropForeign([
                'discount_id',
                'product_id',
                'category_id',
                'subproduct_id',
            ]);
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table->dropForeign(['download_groups_id']);
        });

        //delivery
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropForeign(['carrier_id']);
        });
        Schema::table('delivery_country', function (Blueprint $table) {
            $table->dropForeign(['delivery_id', 'country_id']);
        });

        Schema::table('delivery_states', function (Blueprint $table) {
            $table->dropForeign(['delivery_id', 'state_id']);
        });

        Schema::table('delivery_cities', function (Blueprint $table) {
            $table->dropForeign(['delivery_id', 'city_id']);
        });

        Schema::table('delivery_postal', function (Blueprint $table) {
            $table->dropForeign(['delivery_id', 'postal_id']);
        });

        Schema::table('postals', function (Blueprint $table) {
            $table->dropForeign(['country_id', 'state_id']);
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropForeign(['faq_group_id', 'store_id']);
        });

        Schema::table('faq_groups', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign(['store_id', 'customer_id']);
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });

        Schema::table('types', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        Schema::table('audits', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('insurances', function (Blueprint $table) {
            $table->dropForeign([
                'shipping_id',
                'order_id',
                'insurance_rate_id',
                'insurance_rule_id',
                'tax_id',
            ]);
        });

        Schema::table('insurance_rates', function (Blueprint $table) {
            $table->dropForeign(['geo_id']);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign([
                'store_id',
                'customer_id',
                'order_id',
                'currency_id',
                'history_id',
                'status_id',
            ]);
        });

        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->dropForeign([
                'store_id',
                'invoice_id',
                'payment_method_id',
                'currency_id',
            ]);
        });

        Schema::table('loyalties', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'order_id', 'store_id']);
        });
        Schema::table('loyalty_groups', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'setting_id',
                'customer_group_id',
            ]);
        });
        Schema::table('loyalty_restricts', function (Blueprint $table) {
            $table->dropForeign(['loyalty_group_id', 'restrict_id']);
        });

        Schema::table('loyalty_redeems', function (Blueprint $table) {
            $table->dropForeign(['loyalty_id', 'customer_id', 'order_id']);
        });

        Schema::table('loyalty_statuses', function (Blueprint $table) {
            $table->dropForeign(['loyalty_id', 'order_id', 'customer_id']);
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
        });

        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'store_id']);
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'subscriber_id']);
        });

        //option
        Schema::table('options', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });

        Schema::table('option_values', function (Blueprint $table) {
            $table->dropForeign(['option_id']);
        });

        //order
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign([
                'store_id',
                'customer_id',
                'customer_group_id',
                'status_id',
                'affiliate_id',
                'currency_id',
                'payment_method_id',
            ]);
        });
        Schema::table('order_exchanges', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'rma_id', 'product_exchange_id']);
        });

        Schema::table('order_downloads', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'download_id']);
        });

        Schema::table('order_history', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'history_id']);
        });
        Schema::table('order_options', function (Blueprint $table) {
            $table->dropForeign([
                'order_id',
                'order_product_id',
                'product_option_id',
                'product_option_value_id',
            ]);
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'product_id']);
        });
        Schema::table('order_recurrences', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'product_id', 'profile_id']);
        });
        Schema::table('order_recurrence_transactions', function (
            Blueprint $table
        ) {
            $table->dropForeign(['order_recurrence_id']);
        });

        Schema::table('order_surcharges', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('order_voucher', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'voucher_id']);
        });
        Schema::table('order_custom_fields', function (Blueprint $table) {
            $table->dropForeign([
                'order_id',
                'custom_field_id',
                'custom_field_value_id',
            ]);
        });

        Schema::table('order_shippings', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'supplier_id', 'shipping_id']);
        });

        Schema::table('order_types', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::table('order_frauds', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'customer_id']);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['page_group_id', 'store_id']);
        });

        Schema::table('page_groups', function (Blueprint $table) {
            $table->dropForeign(['parent_id', 'customer_group_id']);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign([
                'category_id',
                'length_id',
                'weight_id',
                'brand_id',
                'tax_id',
                'status_id',
                'store_id',

            ]);
        });
        Schema::table('product_groups', function (Blueprint $table) {
            $table->dropForeign([
                'setting_id',
                'customer_group_id',
                'product_id',
            ]);
        });

        Schema::table('product_shippings', function (Blueprint $table) {
            $table->dropForeign(['method_id', 'product_id']);
        });

        Schema::table('product_relateds', function (Blueprint $table) {
            $table->dropForeign(['related_id', 'product_id']);
        });

        Schema::table('product_profiles', function (Blueprint $table) {
            $table->dropForeign([
                'profile_id',
                'product_id',
                'store_id',
                'customer_group_id',
            ]);
        });

        Schema::table('product_options', function (Blueprint $table) {
            $table->dropForeign(['option_id', 'product_id']);
        });

        Schema::table('product_option_values', function (Blueprint $table) {
            $table->dropForeign([
                'product_option_id',
                'product_id',
                'option_id',
                'option_value_id',
            ]);
        });

        Schema::table('product_location', function (Blueprint $table) {
            $table->dropForeign(['location_id', 'product_id']);
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::table('product_discounts', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'discount_id',
                'customer_group_id',
            ]);
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->dropForeign(['type_id', 'setting_id']);
        });

        Schema::table('product_colours', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'surface_id']);
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'attribute_id']);
        });

        Schema::table('price_groups', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'setting_id']);
        });

        Schema::table('surfaces', function (Blueprint $table) {
            $table->dropForeign(['colour_id']);
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropForeign([
                'brand_id',
                'product_id',
                'length_id',
                'weight_id',
                'supplier_id',
                'tax_id',
                'store_id',
                'currency_id',
            ]);
        });
        Schema::table('purchase_attributes', function (Blueprint $table) {
            $table->dropForeign(['purchase_id', 'attribute_id']);
        });

        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->dropForeign(['purchase_id', 'supplier_id', 'product_id']);
        });

        Schema::table('stock_receives', function (Blueprint $table) {
            $table->dropForeign([
                'purchase_id',
                'supplier_id',
                'product_id',
                'stock_id',
            ]);
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign([
                'store_id',
                'payment_method_id',
                'supplier_id',
                'currency_id',
            ]);
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropForeign(['module_id', 'merchant_id']);
        });

        Schema::table('payment_settings', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id', 'setting_id']);
        });

        Schema::table('merchants', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
        });

        Schema::table('wallets', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'currency_id']);
        });
        Schema::table('wallet_histories', function (Blueprint $table) {
            $table->dropForeign(['wallet_id']);
        });
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::table('quotations', function (Blueprint $table) {
            $table->dropForeign([
                'customer_id',
                'store_id',
                'tax_id',
                'reqoute_id',
                'currency_id',
            ]);
        });
        Schema::table('quotation_history', function (Blueprint $table) {
            $table->dropForeign(['quote_id', 'history_id']);
        });

        Schema::table('quotation_products', function (Blueprint $table) {
            $table->dropForeign(['quote_id', 'product_id']);
        });

        Schema::table('quotation_status', function (Blueprint $table) {
            $table->dropForeign(['quote_id', 'status_id']);
        });

        Schema::table('rmas', function (Blueprint $table) {
            $table->dropForeign([
                'customer_id',
                'status_id',
                'address_id',
                'rma_reason_id',
                'rma_action_id',
                'history_id',
            ]);
        });

        Schema::table('rma_products', function (Blueprint $table) {
            $table->dropForeign(['rma_id', 'order_id', 'product_id']);
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->dropForeign(['rma_id', 'payment_method_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'customer_id']);
        });

        Schema::table('rating_types', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('rating_summaries', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'rating_type_id']);
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'rating_type_id',
                'review_id',
                'customer_id',
            ]);
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign([
                'store_id',
                'supplier_group_id',
                'history_id',
            ]);
        });
        Schema::table('supplier_groups', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
        });

        Schema::table('supplier_settings', function (Blueprint $table) {
            $table->dropForeign(['setting_id', 'supplier_id']);
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'store_id']);
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'customer_id',
                'brand_id',
                'tax_rate_id',
                'status_id',
                'category_id',
                'history_id',
            ]);
        });

        Schema::table('service_actions', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'service_id', 'priority_id']);
        });

        Schema::table('service_options', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });

        Schema::table('service_parts', function (Blueprint $table) {
            $table->dropForeign(['supplier_id', 'service_id']);
        });

        Schema::table('service_shippings', function (Blueprint $table) {
            $table->dropForeign(['package_id', 'service_id']);
            $table->dropForeign([]);
        });
        Schema::table('service_types', function (Blueprint $table) {
            $table->dropForeign(['contract_id', 'service_id']);
        });
        Schema::table('service_warranty', function (Blueprint $table) {
            $table->dropForeign(['warranty_id', 'service_id']);
        });
        Schema::table('order_service', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'service_id']);
        });
        Schema::table('shippings', function (Blueprint $table) {
            $table->dropForeign(['supplier_id', 'module_id', 'setting_id']);
        });

        Schema::table('carriers', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
        });

        Schema::table('shipping_markups', function (Blueprint $table) {
            $table->dropForeign(['shipping_id', 'state_id']);
        });

        Schema::table('shipping_rates', function (Blueprint $table) {
            $table->dropForeign([
                'shipping_id',
                'supplier_id',
                'weight_id',
                'length_id',
                'geo_id',
                'surcharge_id',
                'tax_rate_id',
            ]);
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign(['setting_group_id']);
        });

        //special
        Schema::table('specials', function (Blueprint $table) {
            $table->dropForeign(['customer_group_id', 'product_id']);
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign(['tag_group_id']);
        });
        //taxes
        Schema::table('tax_rates', function (Blueprint $table) {
            $table->dropForeign(['customer_group_id']);
        });
        Schema::table('tax_rules', function (Blueprint $table) {
            $table->dropForeign(['customer_group_id', 'tax_rate_id']);
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign(['permission_id', 'role_id']);
        });
        Schema::table('permission_user', function (Blueprint $table) {
            $table->dropForeign(['permission_id', 'user_id']);
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign(['role_id', 'user_id']);
        });

        Schema::table('confirmations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('securities', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('socials', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropForeign(['theme_id', 'store_id']);
        });

        Schema::table('voucher_histories', function (Blueprint $table) {
            $table->dropForeign(['voucher_id', 'order_id']);
        });
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'product_id','basket_id']);
        });

        Schema::table('wishlist_options', function (Blueprint $table) {
            $table->dropForeign([
                'wishlist_id',
                'option_id',
                'option_value_id'
            ]);
        });

        Schema::table('warranties', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });

        Schema::table('warranty_orders', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('warranty_products', function (Blueprint $table) {
            $table->dropForeign(['warranty_id', 'category_id', 'product_id']);
        });
    }
}
