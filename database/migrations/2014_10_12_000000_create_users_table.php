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
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('description');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 15)->unique();
            $table->string('realName', 30)->nullable();
            $table->string('email', 50)->unique();
            $table->string('phoneNumber', 15)->unique()->nullable();
            $table->string('password');
            $table->string('picture')->default('default.png');
            $table->string('lastLogin')->nullable();
            $table->string('lastIp')->nullable();
            $table->string('aboutMe')->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->enum('active',['yes','no'])->default('no');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('roles');
    }
}
