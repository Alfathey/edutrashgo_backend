<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\KontenDaurUlangController;
use App\Http\Controllers\API\KuisController;
use App\Http\Controllers\API\ModulKategoriController;
use App\Http\Controllers\API\ModulDetailSampahController;
use App\Http\Controllers\API\penggunaController;
use App\Http\Controllers\API\PertanyaanKuisController;
use App\Http\Controllers\API\SkorSiswaController;
use App\Http\Controllers\API\TantanganController;
use App\Http\Controllers\API\TantanganDetailController;
use App\Http\Controllers\Auth\AuthController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    // Rute-rute yang memerlukan otentikasi di sini
});

    Route::apiResource('/berita', BeritaController::class);
    Route::apiResource('/konten-daur-ulang', KontenDaurUlangController::class);
    Route::apiResource('/kuis', KuisController::class);
    Route::apiResource('/modul-kategori', ModulKategoriController::class);
    Route::apiResource('/modul-detail-sampah', ModulDetailSampahController::class);
    Route::get('modul-detail-sampah/kategori/{id_kategori}', [ModulDetailSampahController::class, 'filterByCategory']);
    Route::apiResource('/pengguna', PenggunaController::class);
    Route::apiResource('/pertanyaan-kuis', PertanyaanKuisController::class);
    Route::apiResource('/skor-siswa', SkorSiswaController::class);
    Route::apiResource('/tantangan', TantanganController::class);
    Route::apiResource('/tantangan-detail', TantanganDetailController::class);
    Route::get('tantangan-detail/tantangan/{id_tantangan}', [TantanganDetailController::class, 'filterByTantangan']);

