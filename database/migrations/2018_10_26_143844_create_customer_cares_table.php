<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('customer_cares')){
            Schema::create('customer_cares', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('user_id')->unsigned()->comment('ID khách hàng');
                $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->integer('carer_id')->unsigned()->comment('ID nhân viên chăm sóc khách hàng');

                $table->integer('customer_booking_log_id')->unsigned()->comment('ID đơn đặt phòng');
                $table->foreign('customer_booking_log_id')->references('id')->on('customer_booking_logs')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->string('title')->comment('Tiêu đề');
                $table->text('content')->nullable()->comment('Nội dung');
                $table->tinyInteger('type')->comment('1: Gọi điện thoại. 2: Gửi tin nhắn. 3: Gửi Email');
                $table->tinyInteger('status')->comment('1: Đã nghe máy. 2: Không nghe máy. 3: Thuê bao không liên lạc được. 4: Đã gửi tin nhắn. 5: Đã gửi Email');

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
        Schema::dropIfExists('customer_cares');
    }
}
