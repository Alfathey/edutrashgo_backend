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
        Schema::create('tantangan_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tantangan')->unsigned(); // Menggunakan unsignedBigInteger
            $table->string('misi', 255);
            $table->string('tugas', 255)->nullable();
            $table->timestamps();

            // Menambahkan kunci asing
            $table->foreign('id_tantangan')->references('id_tantangan')->on('tantangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tantangan_detail');
    }
};
