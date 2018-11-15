<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');

                $table->string('name')->comment('Tên người dùng');
                $table->string('email')->unique()->comment('Địa chỉ Email');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password')->comment('Mật khẩu');
                $table->tinyInteger('gender')->default(1)->comment('1: Nam, 0: Nữ');
                $table->date('birthday')->nullable()->comment('Sinh nhật');
                $table->string('mobile', 50)->unique()->nullable()->comment('Số điện thoại');
                $table->string('address')->nullable()->comment('Địa chỉ');
                $table->string('avatar')->nullable()->comment('Ảnh đại diện');
                $table->tinyInteger('rate')->nullable()->comment('Cho điểm khách sạn');
                $table->text('review')->nullable()->comment('Đánh giá khách sạn');
                $table->tinyInteger('type')->default(0)->comment('0: Khách hàng, 1: Nhân viên');

                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
