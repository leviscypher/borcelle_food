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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('isActive')->default('0');
            $table->unsignedBigInteger('role_id')->default(2)->comment('1 - admin; 2 - customer');
            $table->unsignedBigInteger('position_id')->default(2);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('position_id')->references('id')->on('position');
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
        Schema::dropIfExists('users');
    }
};
