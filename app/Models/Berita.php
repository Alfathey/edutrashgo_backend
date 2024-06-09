<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the plural of the model name
    protected $table = 'berita';

    // Specify the primary key if it's different from 'id'
    protected $primaryKey = 'id_berita';

    // Disable auto-incrementing if the primary key is not an integer
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // Define which attributes can be mass-assigned
    protected $fillable = [
        'judul',
        'kategori',
        'konten',
        'url_gambar',
    ];

}
