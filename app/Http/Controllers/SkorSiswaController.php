<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkorSiswa;
use App\Http\Resources\SkorSiswaResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SkorSiswaController extends Controller
{
    // Menampilkan semua data skor siswa.
    public function index()
    {
        $skorSiswa = SkorSiswa::with(['pengguna', 'kuis'])->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all skor siswa',
            'data' => SkorSiswaResource::collection($skorSiswa)
        ]);
    }

    // Menyimpan data skor siswa baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_kuis' => 'required|exists:kuis,id_kuis',
            'skor' => 'required|integer'
        ]);

            $skorSiswa = SkorSiswa::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Skor siswa created successfully',
                'data' => new SkorSiswaResource($skorSiswa)
            ], 201);
    }

    // Menampilkan data skor siswa tertentu.
    public function show($id)
    {
        $skorSiswa = SkorSiswa::with(['pengguna', 'kuis'])->find($id);
        if (!$skorSiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Skor siswa not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new SkorSiswaResource($skorSiswa)
        ]);
    }

    // Mengupdate data skor siswa.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'id_kuis' => 'required|exists:kuis,id_kuis',
            'skor' => 'required|integer'
        ]);

        $skorSiswa = SkorSiswa::find($id);
        if (!$skorSiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Skor siswa not found'
            ], 404);
        }

        $skorSiswa->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Skor siswa updated successfully',
            'data' => new SkorSiswaResource($skorSiswa)
        ], 200);
    }

    // Menghapus data skor siswa.
    public function destroy($id)
    {
        $skorSiswa = SkorSiswa::find($id);
        if (!$skorSiswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'skorSiswa tidak ditemukan'
            ], 404);
        }

        // Delete the berita
        $skorSiswa->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'skorSiswa berhasil dihapus'
        ], 200);
    }
}
