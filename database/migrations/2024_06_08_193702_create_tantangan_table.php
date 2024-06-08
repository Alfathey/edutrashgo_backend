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
        Schema::create('tantangan', function (Blueprint $table) {
            $table->increments('id_tantangan');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->dateTime('batas_waktu')->nullable();
            $table->text('hadiah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tantangan');
    }
};
