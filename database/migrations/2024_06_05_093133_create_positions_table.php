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
        Schema::create('tb_position', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->default('ចំណងជើង');
            $table->timestamps();
        });

        // Inserting titles
        DB::table('tb_position')->insert([
            ['title' => 'ចៅអធិកា'],
            ['title' => 'គ្រូសូត្រស្ដាំ'],
            ['title' => 'គ្រូសូត្រឆ្វេង'],
            ['title' => 'គ្រូឧទ្ទេសភត្ត'],
            ['title' => 'សមណៈសិស្ស'],
            ['title' => 'ភិក្ខុ'],
            ['title' => 'គ្រូបង្រៀន'],
            ['title' => 'អាចារ្យ'],
            ['title' => 'យាយតា'],
            ['title' => 'កូនសិស្សលោក'],
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
        Schema::dropIfExists('tb_position');
    }
};
