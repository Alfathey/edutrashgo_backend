<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TantanganDetail;
use App\Http\Resources\TantanganDetailResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TantanganDetailController extends Controller
{
    // Menampilkan semua data detail tantangan
    public function index()
    {
        $tantanganDetails = TantanganDetail::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all tantangan details',
            'data' => TantanganDetailResource::collection($tantanganDetails)
        ]);
    }

    // Menyimpan data detail tantangan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tantangan' => 'required|exists:tantangan,id_tantangan',
            'misi' => 'required|string|max:255',
            'tugas' => 'nullable|string|max:255'
        ]);

        $tantanganDetail = TantanganDetail::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Tantangan detail created successfully',
            'data' => new TantanganDetailResource($tantanganDetail)
        ], 201);
    }

    // Menampilkan data detail tantangan tertentu
    public function show($id)
    {
        $tantanganDetail = TantanganDetail::find($id);

        return response()->json(
            $tantanganDetail,
            200
        );
    }

    // Mengupdate data detail tantangan
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_tantangan' => 'required|exists:tantangan,id_tantangan',
            'misi' => 'required|string|max:255',
            'tugas' => 'nullable|string|max:255'
        ]);

        $tantanganDetail = TantanganDetail::find($id);
        if (!$tantanganDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Tantangan detail not found'
            ], 404);
        }

        $tantanganDetail->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Tantangan detail updated successfully',
            'data' => new TantanganDetailResource($tantanganDetail)
        ], 200);
    }

    // Menghapus data detail tantangan
    public function destroy($id)
    {
        $tantanganDetail = TantanganDetail::find($id);
        if (!$tantanganDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Tantangan detail not found'
            ], 404);
        }

        $tantanganDetail->delete();
        return response()->json([
            'success' => true,
            'message' => 'Tantangan detail deleted successfully'
        ]);
    }

    public function filterByCategory($id_kategori)
    {
        $modulSampah = TantanganDetail::where('id_tantangan', $id_kategori)->get();

        if ($modulSampah->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No misi tantangan found for this category'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved misi tantangan for this category',
            'data' => TantanganDetailResource::collection($modulSampah)
        ]);
    }
}
