<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TantanganDetail extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tantangan_detail';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['id_tantangan', 'misi', 'tugas'];

    // Mengelola timestamps
    public $timestamps = false;
    
    // Relasi dengan model Tantangan
    public function tantangan()
    {
        return $this->belongsTo(Tantangan::class, 'id_tantangan');
    }
}
