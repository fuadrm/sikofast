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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer', 30);
            $table->date('started_at',);
            $table->date('finished_at',);
            $table->string('no_po', 30);
            $table->string('qty', 20);
            $table->string('phone', 30);
            $table->text('address');
            $table->string('team', 30);
            $table->string('design');
            $table->string('add_detail');
            $table->string('caption');
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
        Schema::dropIfExists('orders');
    }
};
