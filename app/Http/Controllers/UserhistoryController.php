<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\RelawanDaftar;

class UserHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $donasi = Transaction::with('donasi.program.organisasi')
            ->where('user_id', $user->id)
            ->get();

        $relawan = RelawanDaftar::with('programRelawan.program.organisasi')
            ->where('user_id', $user->id)
            ->get();

        return response()->json([
            'donasi' => $donasi,
            'relawan' => $relawan,
        ]);
    }

    // public function index(Request $request)
    // {
    //     // Kita pakai user_id statis 2 supaya bisa cek data tanpa login
    //     $userId = 2;

    //     $donasi = Transaction::with('donasi.program')
    //         ->where('user_id', $userId)
    //         ->get();

    //     $relawan = RelawanDaftar::with('programRelawan.program')
    //         ->where('user_id', $userId)
    //         ->get();

    //     return response()->json([
    //         'donasi' => $donasi,
    //         'relawan' => $relawan,
    //     ]);
    // }
}