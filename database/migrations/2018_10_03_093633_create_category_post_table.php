<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_post')){
            Schema::create('category_post', function (Blueprint $table) {
                $table->integer('post_id')->unsigned();
                $table->integer('category_id')->unsigned();

                $table->foreign('post_id')->references('id')->on('posts')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('categories')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['post_id', 'category_id']);

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
