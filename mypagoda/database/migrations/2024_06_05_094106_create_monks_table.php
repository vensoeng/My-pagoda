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
        Schema::create('tb_monk', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->unsignedBigInteger('type_id')->nullable(false);
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->unsignedBigInteger('position_id')->nullable(false);
            $table->tinyInteger('status')->default(1)->check('status IN (0, 1)');
            $table->string('email', 255)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('tell', 15)->nullable();
            $table->string('img_profile', 255)->nullable(false);
            $table->string('profile_bg', 255)->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('tb_role');
            $table->foreign('type_id')->references('id')->on('tb_type');
            $table->foreign('position_id')->references('id')->on('tb_position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_monk');
    }
};
