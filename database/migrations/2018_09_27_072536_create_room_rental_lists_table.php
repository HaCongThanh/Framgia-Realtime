<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomRentalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('room_rental_lists')){
            Schema::create('room_rental_lists', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('user_id')->unsigned()->comment('ID khách hàng');
                $table->integer('room_id')->unsigned()->comment('ID phòng');
                $table->date('start_date')->comment('Ngày nhận phòng');
                $table->date('end_date')->comment('Ngày trả phòng');

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
        Schema::dropIfExists('room_rental_lists');
    }
}
