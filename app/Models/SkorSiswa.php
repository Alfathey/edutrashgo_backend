<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorSiswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'skor_siswa';

    // Primary key
    protected $primaryKey = 'id_skor_siswa';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['id_pengguna', 'id_kuis', 'skor'];

    // Mengelola timestamps
    public $timestamps = true;

    // Relasi dengan Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    // Relasi dengan Kuis
    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'id_kuis', 'id_kuis');
    }
}
