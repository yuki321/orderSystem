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
        Schema::create('order_histories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("itemId");
            $table->foreign("itemId")->references("id")->on("items");
            $table->unsignedBigInteger("customerId");
            $table->foreign("customerId")->references("id")->on("customers");
            $table->unsignedBigInteger("numOfOeder");
            $table->unsignedBigInteger("totalPrice");
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
        Schema::dropIfExists('order_histories');
    }
};
