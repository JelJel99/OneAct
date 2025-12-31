<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\RelawanDaftar;

class UserHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $donasi = Transaksi::with('donasi.program.organisasi')
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

}