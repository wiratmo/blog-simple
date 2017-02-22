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
            $table->string('title');
            $table->string('keyword');
            $table->string('description');
            $table->integer('viewCounr');
            $table->string('lastIp');
            $table->dateTime('lastview');
            $table->string('typingTextHead');
            $table->string('map');
            $table->timestamps();
        });

        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('picture');
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
