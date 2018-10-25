<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToCustomerBookingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_booking_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('customer_booking_logs', 'status')) {
                $table->tinyInteger('status')->default(0)->comment('0: Deactivate, 1: Activate');
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
            if (Schema::hasColumn('customer_booking_logs', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
}
