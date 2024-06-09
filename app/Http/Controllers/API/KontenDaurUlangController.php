<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KontenDaurUlang;
use App\Http\Resources\ModulDaurUlangResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KontenDaurUlangController extends Controller
{
    public function index()
    {
        $konten = KontenDaurUlang::all();
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved list of all konten',
            'data' => ModulDaurUlangResource::collection($konten)
        ]);
    }

    public function store(Request $request)
    {
        // if (Auth::user()->peran !== 'guru') {
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }

        // Lakukan validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'konten' => 'required|string',
            'url_video' => 'nullable|string|max:255',
        ]);

        // Jika validasi gagal, kembalikan pesan error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Buat konten daur ulang
        $konten = KontenDaurUlang::create($validator->validated());

        // Berhasil membuat, kembalikan respons JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Konten daur ulang berhasil dibuat',
            'data' => new ModulDaurUlangResource($konten)
        ], 201);
    }

    public function show($id)
    {
        $konten = KontenDaurUlang::find($id);

        return response()->json(
            $konten,
            200
        );
    }

    public function update(Request $request, $id)
    {
        // Check if user is authenticated and has the role of "guru"
        // if (Auth::user()->peran !== 'guru') {
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }

        $konten = KontenDaurUlang::find($id);
        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten not found'
            ], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'konten' => 'required|string',
            'url_video' => 'nullable|string|max:255',
        ]);

        // Jika validasi gagal, kembalikan pesan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update konten
        $konten->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Konten updated successfully',
            'data' => new ModulDaurUlangResource($konten)
        ], 200);
    }

    public function destroy($id)
    {
        // Check if user is authenticated and has the role of "guru"
        // if (Auth::user()->peran !== 'guru') {
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }
        
        // Cari konten berdasarkan ID
        $konten = KontenDaurUlang::find($id);
        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten not found'
            ], 404);
        }

        // Hapus konten
        $konten->delete();
        return response()->json([
            'success' => true,
            'message' => 'Konten deleted successfully'
        ], 200);
    }
}
