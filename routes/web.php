<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Http;


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Routing untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/berita', function(){
    $response = Http::get('http://127.0.0.1:8000/api/berita');

    dd($response);
});