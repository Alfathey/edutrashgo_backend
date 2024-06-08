<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanKuis extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pertanyaan_kuis';

    // Primary key
    protected $primaryKey = 'id_pertanyaan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['id_kuis', 'pertanyaan', 'jawaban'];

    // Mengelola timestamps
    public $timestamps = true;

    // Relasi dengan Kuis
    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'id_kuis', 'id_kuis');
    }
}
