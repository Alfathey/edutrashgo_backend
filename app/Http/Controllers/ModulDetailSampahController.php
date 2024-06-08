<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModulDetailSampah;

class ModulDetailSampahController extends Controller
{
    // Menampilkan semua data modul_detail_sampah.
    public function index()
    {
        $details = ModulDetailSampah::with('kategori')->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all detail sampah',
            'data' => $details
        ]);
    }

    // Menyimpan data detail sampah baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:modul_kategori,id_kategori',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_gambar' => 'nullable|string|max:255'
        ]);

        $detail = ModulDetailSampah::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Detail sampah created successfully',
            'data' => $detail
        ], 201);
    }

    // Menampilkan data detail sampah tertentu.
    public function show($id)
    {
        $detail = ModulDetailSampah::with('kategori')->find($id);
        if (!$detail) {
            return response()->json([
                'success' => false,
                'message' => 'Detail sampah not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $detail
        ]);
    }

    // Mengupdate data detail sampah.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:modul_kategori,id_kategori',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_gambar' => 'nullable|string|max:255'
        ]);

        $detail = ModulDetailSampah::find($id);
        if (!$detail) {
            return response()->json([
                'success' => false,
                'message' => 'Detail sampah not found'
            ], 404);
        }

        $detail->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Detail sampah updated successfully',
            'data' => $detail
        ], 200);
    }

    // Menghapus data detail sampah.
    public function destroy($id)
    {
        $detail = ModulDetailSampah::find($id);
        if (!$detail) {
            return response()->json([
                'success' => false,
                'message' => 'Detail sampah not found'
            ], 404);
        }

        $detail->delete();
        return response()->json([
            'success' => true,
            'message' => 'Detail sampah deleted successfully'
        ], 204);
    }
}
