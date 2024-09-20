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
        Schema::create('tb_monk_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monk_id')->unique()->nullable(false);
            $table->string('village', 100)->nullable();
            $table->string('Commune', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('bio', 500)->nullable();
            $table->string('workin', 200)->nullable();
            $table->string('user_profile', 255)->nullable();
            $table->string('img_cover', 255)->nullable();
            $table->timestamps();

            $table->foreign('monk_id')->references('id')->on('tb_monk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_monk_info');
    }
};
