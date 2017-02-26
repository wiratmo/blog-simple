<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 50)->nullable()->unique();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('slug', 50)->unique();
            $table->string('monthYear', 10);
            $table->string('header')->nullable();
            $table->longText('content');
            $table->integer('viewCount')->default(0);
            $table->enum('status',['draf','posted'])->default('draf');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
