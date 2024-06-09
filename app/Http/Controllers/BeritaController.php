<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Resources\DaftarBeritaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    // Menampilkan semua data berita.
    public function index()
    {
        $daftarBerita = Berita::all();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Daftar berita berhasil di ambil',
                'data' => DaftarBeritaResource::collection($daftarBerita)
            ],
            200
        );
    }

    // Menyimpan data berita baru.
    public function store(Request $request)
    {

        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'url_gambar' => 'nullable|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ],
                422
            );
        }

        $berita = Berita::create($validator->validated());

        // return dd($berita);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Berita berhasil dibuat',
                'data' => new DaftarBeritaResource($berita)
            ],
            201
        );
    }

    // Menampilkan data berita tertentu.
    public function show($id)
    {
        $berita = Berita::find($id);

        return response()->json(
            $berita,
            200
        );
    }

    // Mengupdate data berita.
    public function update(Request $request, $id)
    {

        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        // Find the berita by ID
        $berita = Berita::find($id);

        // Check if the berita exists
        if (!$berita) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'konten' => 'required|string',
            'url_gambar' => 'nullable|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update the berita
        $berita->update($validator->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Berita berhasil diperbarui',
            'data' => new DaftarBeritaResource($berita)
        ], 200);
    }

    // Menghapus data berita.
    public function destroy($id)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        
        // Find the berita by ID
        $berita = Berita::find($id);

        // Check if the berita exists
        if (!$berita) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        // Delete the berita
        $berita->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berita berhasil dihapus'
        ], 200);
    }
}
