<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBookingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('customer_booking_logs')){
            Schema::create('customer_booking_logs', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('user_id')->unsigned()->comment('ID khách hàng');
                $table->date('start_date')->comment('Ngày nhận phòng');
                $table->date('end_date')->comment('Ngày trả phòng');
                $table->tinyInteger('total_number_people')->comment('Tổng số người trong lần thuê đó');
                $table->tinyInteger('total_number_room')->comment('Tổng số phòng thuê trong lần thuê đó');
                $table->string('total_money')->comment('Tổng tiền');

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
        Schema::dropIfExists('customer_booking_logs');
    }
}
