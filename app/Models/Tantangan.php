<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tantangan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tantangan';

    // Primary key
    protected $primaryKey = 'id_tantangan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['judul', 'deskripsi', 'batas_waktu', 'hadiah'];

    // Mengelola timestamps
    public $timestamps = true;
}

