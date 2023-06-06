<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('delivery_address');
            $table->integer('address_type')->default('0')->comment('0 - nhà riêng, 1 - công ty, văn phòng');
            $table->integer('isActive')->default('0')->comment('0 - không sử dụng, 1 - đang sử dụng, người dùng có thể thay đổi tùy ý');
            $table->unsignedBigInteger('user_id')->comment('địa chỉ thuộc tài khoản nào');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('ward_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('district_id')->references('id')->on('district');
            $table->foreign('ward_id')->references('id')->on('ward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
};
