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
        Schema::create('tb_creator_video', function (Blueprint $table) {
            $table->id();
            $table->string('khmer_name', 100)->nullable();
            $table->string('english_name', 100)->default('Anonymous');
            $table->string('creator_type', 255)->nullable();
            $table->tinyInteger('status')->default(1)->check('status IN (0, 1)');
            $table->string('img', 255)->nullable();
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
        Schema::dropIfExists('tb_creator_video');
    }
};
