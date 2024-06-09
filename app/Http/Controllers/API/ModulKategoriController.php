<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ModulKategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModulKategoriController extends Controller
{
    // Menampilkan semua data modul_kategori.
    public function index()
    {
        $kategori = ModulKategori::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all categories',
            'data' => $kategori
        ]);
    }

    // Menyimpan data kategori baru.
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama_kategori' => 'required|string|max:255',
    //         'deskripsi_kategori' => 'nullable|string',
    //         'url_gambar_kategori' => 'nullable|string|max:255'
    //     ]);

    //     $kategori = ModulKategori::create($validatedData);
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Category created successfully',
    //         'data' => $kategori
    //     ], 201);
    // }

    // Menampilkan data kategori tertentu.
    public function show($id)
    {
        $kategori = ModulKategori::find($id);
        return response()->json(
            $kategori,
            200
        );
    }

    // Mengupdate data kategori.
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'nama_kategori' => 'required|string|max:255',
    //         'deskripsi_kategori' => 'nullable|string',
    //         'url_gambar_kategori' => 'nullable|string|max:255'
    //     ]);

    //     $kategori = ModulKategori::find($id);
    //     if (!$kategori) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Category not found'
    //         ], 404);
    //     }

    //     $kategori->update($validatedData);
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Category updated successfully',
    //         'data' => $kategori
    //     ], 200);
    // }

    // Menghapus data kategori.
    // public function destroy($id)
    // {
    //     $kategori = ModulKategori::find($id);
    //     if (!$kategori) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Category not found'
    //         ], 404);
    //     }

    //     $kategori->delete();
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Category deleted successfully'
    //     ], 204);
    // }
}
