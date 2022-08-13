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
        Schema::create('detail_orders_szl', function (Blueprint $table) {
            $table->id();
            $table->integer('szl_s')->nullable();
            $table->integer('szl_m')->nullable();
            $table->integer('szl_l')->nullable();
            $table->integer('szl_xl')->nullable();
            $table->integer('szl_2xl')->nullable();
            $table->integer('szl_3xl')->nullable();
            $table->integer('szl_4xl')->nullable();
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
        Schema::dropIfExists('detail_orders_szl');
    }
};
