<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class IndexController extends Controller
{
    public function index()
    {
        $donasiPrograms = Program::with(['donasi', 'organisasi'])
            ->where('type', 'donasi')
            ->where('status', 'approved')
            ->whereHas('donasi') // ⬅️ WAJIB DI SINI
            ->latest()
            ->take(3)
            ->get();

        $relawanPrograms = Program::with(['relawan', 'organisasi'])
            ->where('type', 'relawan')
            ->where('status', 'approved')
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('donasiPrograms', 'relawanPrograms'));
    }
}
