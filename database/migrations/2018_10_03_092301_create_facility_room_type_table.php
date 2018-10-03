<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('facility_room_type')){
            Schema::create('facility_room_type', function (Blueprint $table) {
                $table->integer('room_type_id')->unsigned();
                $table->integer('facility_id')->unsigned();

                $table->foreign('room_type_id')->references('id')->on('room_types')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('facility_id')->references('id')->on('facilities')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['room_type_id', 'facility_id']);

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
        Schema::dropIfExists('facility_room_type');
    }
}
