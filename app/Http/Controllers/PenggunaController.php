<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    // Menampilkan semua data pengguna.
    public function index()
    {
        $pengguna = Pengguna::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all pengguna',
            'data' => $pengguna
        ]);
    }

    // Menyimpan data pengguna baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:pengguna',
            'kata_sandi' => 'required|string|min:8',
            'peran' => 'required|in:siswa,guru'
        ]);

        $pengguna = Pengguna::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Pengguna created successfully',
            'data' => $pengguna
        ], 201);
    }

    // Menampilkan data pengguna tertentu.
    public function show($id)
    {
        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $pengguna
        ]);
    }

    // Mengupdate data pengguna.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:pengguna,username,' . $id . ',id_pengguna',
            'kata_sandi' => 'sometimes|string|min:8',
            'peran' => 'required|in:siswa,guru'
        ]);

        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna not found'
            ], 404);
        }

        $pengguna->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Pengguna updated successfully',
            'data' => $pengguna
        ], 200);
    }

    // Menghapus data pengguna.
    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        if (!$pengguna) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna not found'
            ], 404);
        }

        $pengguna->delete();
        return response()->json([
            'success' => true,
            'message' => 'Pengguna deleted successfully'
        ], 204);
    }
}
