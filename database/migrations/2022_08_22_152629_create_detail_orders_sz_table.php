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
        Schema::create('detail_orders_sz', function (Blueprint $table) {
            $table->id();
            $table->integer('sz_s')->nullable()->default(NULL);
            $table->integer('sz_m')->nullable()->default(NULL);
            $table->integer('sz_l')->nullable()->default(NULL);
            $table->integer('sz_xl')->nullable()->default(NULL);
            $table->integer('sz_2xl')->nullable()->default(NULL);
            $table->integer('sz_3xl')->nullable()->default(NULL);
            $table->integer('sz_4xl')->nullable()->default(NULL);
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
        Schema::dropIfExists('detail_orders_sz');
    }
};
