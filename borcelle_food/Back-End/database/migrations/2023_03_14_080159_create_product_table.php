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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('price', 10, 0);
            $table->string('quantity', 255);
            $table->json('image_path');
            $table->string('description');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('product_status_id')->default('1');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('product_status_id')->references('id')->on('product_status');
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
        Schema::dropIfExists('product');
    }
};
