<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModulDetailSampah;
use App\Http\Resources\ModulDetailSampahResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ModulDetailSampahController extends Controller
{
    public function index()
    {
        $details = ModulDetailSampah::with('kategori')->get();
        return response()->json([
            'success' => true,
            'message' => 'List of all detail sampah',
            'data' => ModulDetailSampahResource::collection($details)
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

        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required|integer|exists:modul_kategori,id_kategori',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_gambar' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $detail = ModulDetailSampah::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Detail sampah created successfully',
            'data' => new ModulDetailSampahResource($detail)
        ], 201);
    }

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
            'message' => 'Successfully retrieved detail sampah',
            'data' => new ModulDetailSampahResource($detail)
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

        $detail = ModulDetailSampah::find($id);
        if (!$detail) {
            return response()->json([
                'success' => false,
                'message' => 'Detail sampah not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required|integer|exists:modul_kategori,id_kategori',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url_gambar' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $detail->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Detail sampah updated successfully',
            'data' => new ModulDetailSampahResource($detail)
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
        ], 200);
    }
}
