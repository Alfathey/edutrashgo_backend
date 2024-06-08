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
        Schema::create('modul_kategori', function (Blueprint $table) {
            $table->increments('id_kategori');
            $table->string('nama_kategori');
            $table->text('deskripsi_kategori')->nullable();
            $table->string('url_gambar_kategori')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_kategori');
    }
};
