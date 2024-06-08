<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pengguna';

    // Primary key
    protected $primaryKey = 'id_pengguna';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['username', 'kata_sandi', 'peran'];

    // Mengelola timestamps
    public $timestamps = true;

    // Hash kata sandi sebelum menyimpan
    public function setKataSandiAttribute($value)
    {
        $this->attributes['kata_sandi'] = Hash::make($value);
    }
}
