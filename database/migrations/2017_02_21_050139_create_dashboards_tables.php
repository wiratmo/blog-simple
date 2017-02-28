<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('favicon')->nullable();
            $table->string('headIcon')->nullable();
            $table->string('headQuote')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->integer('viewCount')->nullable();
            $table->string('lastIp')->nullable();
            $table->dateTime('lastview')->nullable();
            $table->string('typingTextHead')->nullable();
            $table->longText('map')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('picture')->nullable();
            $table->string('alt')->nullable();
            $table->enum('type',['services','work','superiority']);
            $table->enum('active',['yes','no'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboards');
        Schema::dropIfExists('services');
    }
}
