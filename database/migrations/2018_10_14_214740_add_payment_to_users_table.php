<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'card_type')) {
                $table->string('card_type')->nullable()->comment('Loại thẻ thanh toán');
            }

            if (!Schema::hasColumn('users', 'card_number')) {
                $table->string('card_number')->nullable()->comment('Số thẻ thanh toán');
            }

            if (!Schema::hasColumn('users', 'expire')) {
                $table->tinyInteger('expire')->nullable()->comment('Ngày hết hạn');
            }

            if (!Schema::hasColumn('users', 'year')) {
                $table->string('year', 5)->nullable()->comment('Năm hết hạn');
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
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'card_type')) {
                $table->dropColumn('card_type');
            }

            if (Schema::hasColumn('users', 'card_number')) {
                $table->dropColumn('card_number');
            }

            if (Schema::hasColumn('users', 'expire')) {
                $table->dropColumn('expire');
            }

            if (Schema::hasColumn('users', 'year')) {
                $table->dropColumn('year');
            }
        });
    }
}
