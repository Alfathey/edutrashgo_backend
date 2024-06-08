<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;

class KuisController extends Controller
{
    public function index()
    {
        $kuis = Kuis::all();
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved list of all kuis',
            'data' => $kuis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kuis = Kuis::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Kuis created successfully',
            'data' => $kuis
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
            'data' => $kuis
        ]);
    }

    public function update(Request $request, $id)
    {
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
            'data' => $kuis
        ], 200);
    }

    public function destroy($id)
    {
        $kuis = Kuis::find($id);
        if (!$kuis) {
            return response()->json([
                'success' => false,
                'message' => 'Kuis not found'
            ], 404);
        }

        $kuis->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kuis deleted successfully'
        ], 204);
    }
}
