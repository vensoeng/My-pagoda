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
        Schema::create('tb_video', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->unsignedBigInteger('creator_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('img', 255)->nullable();
            $table->string('link', 500)->nullable();
            $table->tinyInteger('status')->default(1)->check('status IN (0, 1)');
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('tb_creator_video');
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
        Schema::dropIfExists('tb_video');
    }
};
