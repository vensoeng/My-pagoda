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
        Schema::create('tb_type', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->default('ចំណងជើង');
            $table->timestamps();
        });
        // Inserting titles
        DB::table('tb_type')->insert([
            ['title' => 'ភិក្ខុ'],
            ['title' => 'សាមណេរ'],
            ['title' => 'គ្រហស្ថ'],
            ['title' => 'ផ្សេងៗ'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_type');
    }
};
