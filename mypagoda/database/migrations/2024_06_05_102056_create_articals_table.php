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
        Schema::create('tb_artical', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('title', 200)->nullable();
            $table->string('descript', 500)->nullable();
            $table->string('img', 255)->nullable();
            $table->string('creator', 50)->nullable();
            $table->string('text_file', 255)->nullable();
            $table->tinyInteger('status')->default(1)->check('status IN (0, 1)');
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
        Schema::dropIfExists('tb_artical');
    }
};
