<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('posts')){
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('user_id')->unsigned()->comment('ID người viết');
                $table->tinyInteger('status')->default(0)->comment('1: Được duyệt, 0: Chưa được duyệt');
                $table->string('title')->comment('Tiêu đề bài viết');
                $table->string('slug')->unique()->comment('Sờ lắc :>');
                $table->string('image')->nullable()->comment('Ảnh bài viết');
                $table->text('description')->nullable()->comment('Tóm tắt nội dung bài viết');
                $table->text('content')->nullable()->comment('Nội dung bài viết');

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
        Schema::dropIfExists('posts');
    }
}
