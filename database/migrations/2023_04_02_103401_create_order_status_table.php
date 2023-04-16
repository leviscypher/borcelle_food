<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        DB::table('order_status')->insert([
            ['status' => 'Tất cả đơn'],
            ['status' => 'Chờ thanh toán'],
            ['status' => 'Đang xử lý'],
            ['status' => 'Đang vận chuyển'],
            ['status' => 'Đã giao'],
            ['status' => 'Đã hủy'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status');
    }
};
