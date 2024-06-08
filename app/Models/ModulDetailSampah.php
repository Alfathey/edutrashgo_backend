<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulDetailSampah extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'modul_detail_sampah';

    // Primary key
    protected $primaryKey = 'id_detail_sampah';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['id_kategori', 'nama', 'deskripsi', 'url_gambar'];

    // Mengelola timestamps
    public $timestamps = true;

    // Relasi dengan ModulKategori
    public function kategori()
    {
        return $this->belongsTo(ModulKategori::class, 'id_kategori', 'id_kategori');
    }
}
