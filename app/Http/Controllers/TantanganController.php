<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tantangan;

class TantanganController extends Controller
{
    // Menampilkan semua data tantangan.
    public function index()
    {
        $tantangan = Tantangan::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all tantangan',
            'data' => $tantangan
        ]);
    }

    // Menyimpan data tantangan baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
            'hadiah' => 'nullable|string'
        ]);

        $tantangan = Tantangan::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Tantangan created successfully',
            'data' => $tantangan
        ], 201);
    }

    // Menampilkan data tantangan tertentu.
    public function show($id)
    {
        $tantangan = Tantangan::find($id);
        if (!$tantangan) {
            return response()->json([
                'success' => false,
                'message' => 'Tantangan not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $tantangan
        ]);
    }

    // Mengupdate data tantangan.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
            'hadiah' => 'nullable|string'
        ]);

        $tantangan = Tantangan::find($id);
        if (!$tantangan) {
            return response()->json([
                'success' => false,
                'message' => 'Tantangan not found'
            ], 404);
        }

        $tantangan->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Tantangan updated successfully',
            'data' => $tantangan
        ], 200);
    }

    // Menghapus data tantangan.
    public function destroy($id)
    {
        $tantangan = Tantangan::find($id);
        if (!$tantangan) {
            return response()->json([
                'success' => false,
                'message' => 'Tantangan not found'
            ], 404);
        }

        $tantangan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Tantangan deleted successfully'
        ], 204);
    }
}

