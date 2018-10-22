<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerBookingLogIdToRoomRentalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_rental_lists', function (Blueprint $table) {
            if (!Schema::hasColumn('room_rental_lists', 'customer_booking_log_id')) {
                $table->integer('customer_booking_log_id')->unsigned()->comment('ID nhật ký đặt phòng');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_rental_lists', function (Blueprint $table) {
            if (Schema::hasColumn('room_rental_lists', 'customer_booking_log_id')) {
                $table->dropColumn('customer_booking_log_id');
            }
        });
    }
}
