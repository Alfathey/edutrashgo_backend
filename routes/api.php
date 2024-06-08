<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontenDaurUlangController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\ModulKategoriController;
use App\Http\Controllers\ModulDetailSampahController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\PertanyaanKuisController;
use App\Http\Controllers\SkorSiswaController;
use App\Http\Controllers\TantanganController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/berita', BeritaController::class);
Route::apiResource('/konten-daur-ulang', KontenDaurUlangController::class);
Route::apiResource('/kuis', KuisController::class);
Route::apiResource('/modul-kategori', ModulKategoriController::class);
Route::apiResource('/modul-detail-sampah', ModulDetailSampahController::class);
Route::apiResource('/pengguna', PenggunaController::class);
Route::apiResource('/pertanyaan-kuis', PertanyaanKuisController::class);
Route::apiResource('/skor-siswa', SkorSiswaController::class);
Route::apiResource('/tantangan', TantanganController::class);
