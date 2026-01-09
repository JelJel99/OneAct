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
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'name' => 'required|string|max:255',
            'nohp' => 'nullable|string|max:255',
            'kabupatenkotadomisili' => 'nullable|string|max:255',
            'tanggallahir' => 'nullable|integer|digits:4',
        ]);

        $birthDate = $request->tanggallahir
            ? $request->tanggallahir . '-01-01'
            : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'kabupatenkotadomisili' => $request->kabupatenkotadomisili,
            'tanggallahir' => $birthDate,
            'role' => 'Relawan',
        ]);

        // 🔥 AUTO LOGIN KE SESSION
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'user' => $user
        ], 201);
    }


    // =========================================================
    // 2. FUNGSI LOGIN
    // =========================================================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::guard('web')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah'
            ], 401);
        }

        // 🔥 WAJIB
        $request->session()->regenerate();

        // 🔥 INI YANG KURANG KEMARIN
        $user = auth()->user();

        if ($user->role === 'admin') {
            $redirect = '/admin/dashboard';
        } elseif ($user->role === 'organisasi') {
            $redirect = '/org/dashboard';
        } else {
            $redirect = '/home';
        }

        return response()->json([
            'success' => true,
            'user' => $user,
            'redirect_to' => $redirect
        ]);
    }

    // =========================================================
    // 3. FUNGSI LOGOUT
    // =========================================================
    public function logout(Request $request)
    {
        Auth::logout();                    // Logout user dari session
        $request->session()->invalidate(); // Batalkan semua session saat ini
        $request->session()->regenerateToken(); // Regenerate CSRF token agar aman

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    }

}