<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kuis';

    // Primary key
    protected $primaryKey = 'id_kuis';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['judul', 'deskripsi'];

    // Mengelola timestamps
    public $timestamps = true;
}
