<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
			$table->string('description',155);
            $table->morphs('seoable');
			$table->string('keyword');
            $table->string('referrer');

            $table->string('meta_image')->default()->nullable();
            $table->string('canonical')->nullable();
            $table->string('robots')->nullable();
            //geo
            $table->string('geo_region')->default()->nullable();
            $table->string('geo_position')->default()->nullable();
            $table->string('geo_placename')->default()->nullable();
            //dublin
            $table->string('dcterms_format')->default()->nullable();
            $table->string('dcterms_language')->default()->nullable();
            $table->string('dcterms_identifier')->default()->nullable();
            $table->string('dcterms_relation')->default()->nullable();
            $table->string('dcterms_publisher')->default()->nullable();
            $table->string('dcterms_coverage')->default()->nullable();
            $table->string('dcterms_title')->default()->nullable();
            $table->string('dcterms_subject')->default()->nullable();
            $table->string('dcterms_contributor')->default()->nullable();
            $table->string('dcterms_description')->nullable();
            //FB openGraph
            $table->string('og_locale')->default()->nullable();
            $table->string('og_type')->default()->nullable();
            $table->string('og_url')->default()->nullable();
            $table->string('og_title')->default()->nullable();
            $table->string('og_description')->default()->nullable();
            $table->string('og_image')->default()->nullable();
            $table->string('og_site_name')->default()->nullable();
            $table->string('og_video')->nullable();
            $table->string('og_audio')->nullable();
            $table->string('og_determiner')->nullable();

            $table->string('fb_app_id')->default()->unique();
            //Twitter
            $table->string('twitter_card')->default()->nullable();
            $table->string('twitter_site')->default()->nullable();
            $table->string('twitter_title')->default()->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('twitter_image')->default()->nullable();
            $table->string('twitter_creator')->default()->nullable();
            $table->string('twitter_domain')->nullable();
            //Schema.org
            $table->string('changefreq', 10)->nullable();
            $table->string('priority', 10)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seos');
    }
}
