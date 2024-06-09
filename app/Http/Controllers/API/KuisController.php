<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kuis;
use App\Http\Resources\KuisResource;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    public function index()
    {
        $kuis = Kuis::all();
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved list of all kuis',
            'data' => KuisResource::collection($kuis)
        ]);
    }

    public function store(Request $request)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kuis = Kuis::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Kuis created successfully',
            'data' => new KuisResource($kuis)
        ], 201);
    }

    public function show($id)
    {
        $kuis = Kuis::find($id);
        if (!$kuis) {
            return response()->json([
                'success' => false,
                'message' => 'Kuis not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved kuis',
            'data' => new KuisResource($kuis)
        ]);
    }

    public function update(Request $request, $id)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kuis = Kuis::find($id);
        if (!$kuis) {
            return response()->json([
                'success' => false,
                'message' => 'Kuis not found'
            ], 404);
        }

        $kuis->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Kuis updated successfully',
            'data' => new KuisResource($kuis)
        ], 200);
    }

    public function destroy($id)
    {
        // Check if user is authenticated and has the role of "guru"
        if (Auth::user()->peran !== 'guru') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        
        $kuis = Kuis::find($id);
        if (!$kuis) {
            return response()->json([
                'status' => 'error',
                'message' => 'kuis tidak ditemukan'
            ], 404);
        }

        // Delete the kuis
        $kuis->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'kuis berhasil dihapus'
        ], 200);
    }
}
