<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('room_types')){
            Schema::create('room_types', function (Blueprint $table) {
                $table->increments('id');

                $table->string('name')->unique()->comment('Tên loại phòng');
                $table->float('room_size')->comment('Diện tích của phòng');
                $table->tinyInteger('bed')->comment('Số giường ngủ');
                $table->tinyInteger('max_people')->comment('Số người tối đa');
                $table->string('price')->comment('Giá (1 đêm x 1 người) của phòng');
                $table->string('image')->comment('Ảnh của phòng');
                $table->text('description')->comment('Miêu tả về loại phòng');
                $table->text('facilities')->comment('Các tiện nghi của loại phòng này');

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
        Schema::dropIfExists('room_types');
    }
}
