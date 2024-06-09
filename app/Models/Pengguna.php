<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, AuthenticableTrait;

    // Nama tabel
    protected $table = 'pengguna';

    // Primary key
    protected $primaryKey = 'id_pengguna';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['username', 'kata_sandi', 'peran'];

    // Mendefinisikan atribut yang harus disembunyikan
    protected $hidden = ['kata_sandi'];

    // Mengelola timestamps
    public $timestamps = true;

}
