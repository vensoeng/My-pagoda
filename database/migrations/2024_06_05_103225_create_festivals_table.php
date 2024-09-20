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
        Schema::create('td_festival', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->tinyInteger('status')->default(1)->check('status IN (0, 1)');
            $table->string('title', 255);
            $table->string('img', 255)->nullable();
            $table->string('length_photo', 5)->nullable();
            $table->string('link', 500)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('tb_monk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_festival');
    }
};
