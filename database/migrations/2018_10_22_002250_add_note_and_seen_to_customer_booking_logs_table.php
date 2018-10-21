<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoteAndSeenToCustomerBookingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_booking_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('customer_booking_logs', 'note')) {
                $table->text('note')->nullable()->comment('Ghi chú khi đặt phòng');
            }

            if (!Schema::hasColumn('customer_booking_logs', 'seen')) {
                $table->tinyInteger('seen')->default(0)->comment('0: Chưa xem. 1: Đã xem');
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
        Schema::table('customer_booking_logs', function (Blueprint $table) {
            if (Schema::hasColumn('customer_booking_logs', 'note')) {
                $table->dropColumn('note');
            }

            if (Schema::hasColumn('customer_booking_logs', 'seen')) {
                $table->dropColumn('seen');
            }
        });
    }
}
