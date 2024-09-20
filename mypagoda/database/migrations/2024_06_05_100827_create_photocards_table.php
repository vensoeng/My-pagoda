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
        Schema::create('tb_card_photo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_monk')->nullable(false);
            $table->string('title', 100)->nullable();
            $table->string('img', 500)->nullable();
            $table->timestamps();

            $table->foreign('id_monk')->references('id')->on('tb_monk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_card_photo');
    }
};
