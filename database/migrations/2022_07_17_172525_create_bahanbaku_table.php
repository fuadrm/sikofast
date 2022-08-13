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
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->id();
            $table->string('bb_name1', 50);
            $table->string('bb_name2', 50);
            $table->date('tgl_belanja');
            $table->string('nota');
            $table->integer('jmlh1');
            $table->integer('jmlh2');
            $table->integer('total_price');
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
        Schema::dropIfExists('bahanbaku');
    }
};
