<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:pengguna',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['peran'] = 'siswa'; // Atur peran secara otomatis
        $validatedData['kata_sandi'] = Hash::make($request->password);

        $pengguna = Pengguna::create($validatedData);

        

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil terdaftar',
            'data' => $pengguna,
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengguna = Pengguna::where('username', $request->username)->first();

        if (!$pengguna) {
            Log::info('Pengguna tidak ditemukan', ['username' => $request->username]);
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if (Hash::check($request->password, $pengguna->kata_sandi)) {
            // Buat token API
            $token = $pengguna->createToken('API Token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Authenticated',
                'token' => $token
            ], 200);
        } else {
            Log::info('Password tidak cocok', ['username' => $request->username]);
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
