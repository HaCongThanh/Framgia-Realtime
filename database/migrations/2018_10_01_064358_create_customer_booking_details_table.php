<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('customer_booking_details')){
            Schema::create('customer_booking_details', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('customer_booking_log_id')->unsigned()->comment('ID nhật ký thuê phòng');
                $table->integer('room_type_id')->unsigned()->comment('ID loại phòng');
                $table->tinyInteger('number_room')->comment('Số lượng phòng thuê của loại phòng này');
                $table->string('total_price')->comment('Thành tiền');

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
        Schema::dropIfExists('customer_booking_details');
    }
}
