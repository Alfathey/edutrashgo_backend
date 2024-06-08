<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Menampilkan semua data berita.
    public function index()
    {
        $berita = Berita::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all berita',
            'data' => $berita
        ]);
    }

    // Menyimpan data berita baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'nullable|string|max:255'
        ]);

        $berita = Berita::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Berita created successfully',
            'data' => $berita
        ], 201);
    }

    // Menampilkan data berita tertentu.
    public function show($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $berita
        ]);
    }

    // Mengupdate data berita.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'nullable|string|max:255'
        ]);

        $berita = Berita::find($id);
        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found'
            ], 404);
        }

        $berita->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Berita updated successfully',
            'data' => $berita
        ], 200);
    }

    // Menghapus data berita.
    public function destroy($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita not found'
            ], 404);
        }

        $berita->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berita deleted successfully'
        ], 204);
    }
}
