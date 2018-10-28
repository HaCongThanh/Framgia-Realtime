<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('email_templates')){
            Schema::create('email_templates', function (Blueprint $table) {
                $table->increments('id');

                $table->string('name')->unique()->comment('Tên mẫu Email');
                $table->string('title')->comment('Tiêu đề Email');
                $table->text('content')->nullable()->comment('Nội dung Email');

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
        Schema::dropIfExists('email_templates');
    }
}
