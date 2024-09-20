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
        Schema::create('tb_role', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->default('ចំណងជើង');
            $table->timestamps();
        });

        // Inserting titles
        DB::table('tb_role')->insert([
            ['title' => 'អ្នកគ្រប់គ្រង'],
            ['title' => 'អ្នកប្រើប្រាស'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_role');
    }
};
