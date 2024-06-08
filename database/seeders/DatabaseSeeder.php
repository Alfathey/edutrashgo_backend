<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restoran;
use App\Models\Berita;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $daftarBerita = [
            [
                'kategori' => 'Technology',
                'judul' => 'WatchOS 10 preview: widgets all the way down',
                'waktu' => 'Jul 10, 2023 • 4 min ago',
                'gambar' => 'image-berita.png'
            ],
            [
                'kategori' => 'Health',
                'judul' => 'New health benefits discovered in the latest study',
                'waktu' => 'Jun 9, 2023 • 10 min ago',
                'gambar' => 'image-berita.png'
            ],
            [
                'kategori' => 'Business',
                'judul' => 'Market trends for 2023: what to expect',
                'waktu' => 'May 5, 2023 • 1 hour ago',
                'gambar' => 'image-berita.png'
            ],
            [
                'kategori' => 'Sports',
                'judul' => 'Championship results: a surprising turn of events',
                'waktu' => 'Apr 2, 2023 • 30 min ago',
                'gambar' => 'image-berita.png'
            ],
            [
                'kategori' => 'Entertainment',
                'judul' => 'Top movies to watch this summer',
                'waktu' => 'Mar 1, 2023 • 2 hours ago',
                'gambar' => 'image-berita.png'
            ],
        ];
        
        // Looping melalui array untuk membuat berita menggunakan model Berita
        foreach ($daftarBerita as $berita) {
            Berita::create($berita);
        }
        
    }
}
