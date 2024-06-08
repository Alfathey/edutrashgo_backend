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
        Schema::create('modul_detail_sampah', function (Blueprint $table) {
            $table->increments('id_detail_sampah');
            $table->integer('id_kategori')->unsigned();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('url_gambar')->nullable();
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('modul_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_detail_sampah');
    }
};
