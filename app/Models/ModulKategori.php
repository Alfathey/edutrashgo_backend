<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulKategori extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'modul_kategori';

    // Primary key
    protected $primaryKey = 'id_kategori';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_kategori', 'deskripsi_kategori', 'url_gambar_kategori'];

    // Mengelola timestamps
    public $timestamps = true;
}
