<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkorSiswa;

class SkorSiswaController extends Controller
{
    // Menampilkan semua data skor siswa.
    public function index()
    {
        $skorSiswa = SkorSiswa::with(['pengguna', 'kuis'])->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all skor siswa',
            'data' => $skorSiswa
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
            'data' => $skorSiswa
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
            'data' => $skorSiswa
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
            'data' => $skorSiswa
        ], 200);
    }

    // Menghapus data skor siswa.
    public function destroy($id)
    {
        $skorSiswa = SkorSiswa::find($id);
        if (!$skorSiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Skor siswa not found'
            ], 404);
        }

        $skorSiswa->delete();
        return response()->json([
            'success' => true,
            'message' => 'Skor siswa deleted successfully'
        ], 204);
    }
}
