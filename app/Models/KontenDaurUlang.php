<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenDaurUlang extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'konten_daur_ulang';

    // Tentukan primary key jika tidak menggunakan id
    protected $primaryKey = 'id_konten';

    // Izinkan pengisian massal pada kolom-kolom ini
    protected $fillable = ['judul', 'deskripsi', 'konten', 'url_video'];

    // Nonaktifkan timestamps jika tidak menggunakan kolom created_at dan updated_at
    public $timestamps = true;
}
