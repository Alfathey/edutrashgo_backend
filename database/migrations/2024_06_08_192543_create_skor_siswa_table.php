<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skor_siswa', function (Blueprint $table) {
            $table->increments('id_skor_siswa');
            $table->integer('id_pengguna')->unsigned();
            $table->integer('id_kuis')->unsigned();
            $table->integer('skor')->nullable();
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_kuis')->references('id_kuis')->on('kuis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_siswa');
    }
};
