<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // =========================================================
    // 1. FUNGSI PENDAFTARAN (SIGNUP)
    // =========================================================
    public function signup(Request $request)
    {
        try {
            // Validasi data yang masuk dari form signup.js
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'name' => 'required|string|max:255',
                'nohp' => 'nullable|string|max:255',
                'kabupatenkotadomisili' => 'nullable|string|max:255',
                'tanggallahir' => 'nullable|integer|digits:4', // Menerima tahun (signupYear)
            ]);

            // Konversi Tahun Lahir (signupYear) ke format DATE 'YYYY-01-01'
            $year = $request->tanggallahir;
            $birthDate = $year ? $year . '-01-01' : null;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // PENTING: Password di-hash
                'nohp' => $request->nohp,
                'kabupatenkotadomisili' => $request->kabupatenkotadomisili,
                'tanggallahir' => $birthDate,
                'role' => 'Relawan', // Set default role
            ]);

            // Opsional: Buat token saat pendaftaran berhasil (untuk langsung login)
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil. Silakan masuk.',
                'token' => $token
            ], 201);

        } catch (ValidationException $e) {
            // Tangani error validasi (misal: email sudah terdaftar)
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // =========================================================
    // 2. FUNGSI LOGIN
    // =========================================================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Buat token autentikasi menggunakan Laravel Sanctum
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil.',
                'token' => $token,
                'user' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kombinasi email dan password tidak valid.'
        ], 401);
    }
}