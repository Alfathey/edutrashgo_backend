<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenDaurUlang;

class KontenDaurUlangController extends Controller
{
    public function index()
    {
        $konten = KontenDaurUlang::all();
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved list of all konten',
            'data' => $konten
        ]);
    }

    public function store(Request $request)
    {
        $konten = KontenDaurUlang::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Konten created successfully',
            'data' => $konten
        ], 201);
    }

    public function show($id)
    {
        $konten = KontenDaurUlang::find($id);
        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved konten',
            'data' => $konten
        ]);
    }

    public function update(Request $request, $id)
    {
        $konten = KontenDaurUlang::find($id);
        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten not found'
            ], 404);
        }

        $konten->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Konten updated successfully',
            'data' => $konten
        ], 200);
    }

    public function destroy($id)
    {
        $konten = KontenDaurUlang::find($id);
        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten not found'
            ], 404);
        }

        $konten->delete();
        return response()->json([
            'success' => true,
            'message' => 'Konten deleted successfully'
        ], 204);
    }
}
