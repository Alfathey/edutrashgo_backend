<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanKuis;

class PertanyaanKuisController extends Controller
{
    // Menampilkan semua data pertanyaan kuis.
    public function index()
    {
        $pertanyaanKuis = PertanyaanKuis::with('kuis')->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all pertanyaan kuis',
            'data' => $pertanyaanKuis
        ]);
    }

    // Menyimpan data pertanyaan kuis baru.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kuis' => 'required|exists:kuis,id_kuis',
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string'
        ]);

        $pertanyaanKuis = PertanyaanKuis::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Pertanyaan kuis created successfully',
            'data' => $pertanyaanKuis
        ], 201);
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

        return response()->json([
            'success' => true,
            'data' => $pertanyaanKuis
        ]);
    }

    // Mengupdate data pertanyaan kuis.
    public function update(Request $request, $id)
    {
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
            'success' => true,
            'message' => 'Pertanyaan kuis updated successfully',
            'data' => $pertanyaanKuis
        ], 200);
    }

    // Menghapus data pertanyaan kuis.
    public function destroy($id)
    {
        $pertanyaanKuis = PertanyaanKuis::find($id);
        if (!$pertanyaanKuis) {
            return response()->json([
                'success' => false,
                'message' => 'Pertanyaan kuis not found'
            ], 404);
        }

        $pertanyaanKuis->delete();
        return response()->json([
            'success' => true,
            'message' => 'Pertanyaan kuis deleted successfully'
        ], 204);
    }
}
