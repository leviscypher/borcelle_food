<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        DB::table('position')->insert([
            ['name' => 'quản trị viên'],
            ['name' => 'nhân viên bán hàng'],
            ['name' => 'thu ngân'],
            ['name' => 'kế toán'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position');
    }
};
