<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil data dari API
        $response = Http::get('http://127.0.0.1:8000/api/berita');
        
        if ($response->successful()) {
            // Mengambil data JSON dari respons
            $berita = $response->json();

            // Mengirim data ke view
            return view('berita.index', ['berita' => $berita]);
        } else {
            // Jika gagal mendapatkan data dari API, kirimkan pesan error ke view
            return view('berita.index', ['error' => 'Gagal mendapatkan data dari API']);
        }
    }
}
