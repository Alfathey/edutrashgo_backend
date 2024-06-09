<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanKuis;
use App\Http\Resources\PertanyaanKuisResource;
use Illuminate\Support\Facades\Auth;

class PertanyaanKuisController extends Controller
{
    // Menampilkan semua data pertanyaan kuis.
    public function index()
    {
        $pertanyaanKuis = PertanyaanKuis::with('kuis')->get();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Daftar pertanyaan berhasil di ambil',
                'data' => PertanyaanKuisResource::collection($pertanyaanKuis)
            ],
            200
        );
    }

    // Menyimpan data pertanyaan kuis baru.
    public function store(Request $request)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validatedData = $request->validate([
            'id_kuis' => 'required|exists:kuis,id_kuis',
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string'
        ]);

        $pertanyaanKuis = PertanyaanKuis::create($validatedData);
        return response()->json(
            [
                'status' => 'success',
                'message' => 'pertanyaan berhasil dibuat',
                'data' => new PertanyaanKuisResource($pertanyaanKuis)
            ],
            201
        );
    }

    // Menampilkan data pertanyaan kuis tertentu.
    public function show($id)
    {
        $pertanyaanKuis = PertanyaanKuis::with('kuis')->find($id);
        if (!$pertanyaanKuis) {
            return response()->json([
                'success' => false,
                'message' => 'Pertanyaan kuis not found'
            ], 404);
        }

        return new PertanyaanKuisResource($pertanyaanKuis);
    }

    // Mengupdate data pertanyaan kuis.
    public function update(Request $request, $id)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validatedData = $request->validate([
            'id_kuis' => 'required|exists:kuis,id_kuis',
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string'
        ]);

        $pertanyaanKuis = PertanyaanKuis::find($id);
        if (!$pertanyaanKuis) {
            return response()->json([
                'success' => false,
                'message' => 'Pertanyaan kuis not found'
            ], 404);
        }

        $pertanyaanKuis->update($validatedData);
        return response()->json([
            'status' => 'success',
            'message' => 'pertanyaan berhasil diperbarui',
            'data' => new PertanyaanKuisResource($pertanyaanKuis)
        ], 200);
    }

    // Menghapus data pertanyaan kuis.
    public function destroy($id)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        
        $pertanyaanKuis = PertanyaanKuis::find($id);
        if (!$pertanyaanKuis) {
            return response()->json([
                'status' => 'error',
                'message' => 'pertanyaanKuis tidak ditemukan'
            ], 404);
        }

        // Delete the berita
        $pertanyaanKuis->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'pertanyaanKuis berhasil dihapus'
        ], 200);
    }
}
