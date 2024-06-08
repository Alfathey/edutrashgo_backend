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
        Schema::create('pertanyaan_kuis', function (Blueprint $table) {
            $table->increments('id_pertanyaan');
            $table->integer('id_kuis')->unsigned();
            $table->text('pertanyaan');
            $table->text('jawaban');
            $table->timestamps();
            $table->foreign('id_kuis')->references('id_kuis')->on('kuis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_kuis');
    }
};
