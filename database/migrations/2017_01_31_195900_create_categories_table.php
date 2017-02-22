<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 50);
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('slug', 50)->unique();
            $table->enum('importent',['yes','no'])->default('no');
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('article_category', function(Blueprint $table){
            $table->integer('article_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['article_id','category_id']);

            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('categories');
    }
}
