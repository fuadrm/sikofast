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
        Schema::create('detail_orders_szs', function (Blueprint $table) {
            $table->id();
            $table->integer('szs_s')->nullable();
            $table->integer('szs_m')->nullable();
            $table->integer('szs_l')->nullable();
            $table->integer('szs_xl')->nullable();
            $table->integer('szs_2xl')->nullable();
            $table->integer('szs_3xl')->nullable();
            $table->integer('szs_4xl')->nullable();
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
        Schema::dropIfExists('detail_orders_szs');
    }
};
