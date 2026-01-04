<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\ProgramRelawan;
use App\Models\RelawanDaftar;


class IndexController extends Controller
{
    public function index()
    {
        // ===== DONASI (Program) =====
        $donasiPrograms = Program::with(['donasi', 'organisasi'])
            ->where('type', 'donasi')
            ->where('status', 'approved')
            ->whereHas('donasi')
            ->latest()
            ->take(3)
            ->get();

        // ===== RELAWAN (Program) =====
        $relawanPrograms = Program::with(['relawan', 'organisasi'])
            ->where('type', 'relawan')
            ->where('status', 'approved')
            ->latest()
            ->take(3)
            ->get();

        // ===== RELAWAN LAMA (ProgramRelawan) =====
        $programrelawan = ProgramRelawan::orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact(
            'donasiPrograms',
            'relawanPrograms',
            'programrelawan'
        ));
    }

    public function programrelawandetail($id)
    {
        $programrelawan = ProgramRelawan::findOrFail($id);

        $sudahdaftar = false;
        if (Auth::check()) {
            $sudahdaftar = RelawanDaftar::where('user_id', Auth::id())
                ->where('programrelawan_id', $id)
                ->exists();
        }

        return view('programrelawandetail', compact(
            'programrelawan',
            'sudahdaftar'
        ));
    }

    public function relawandaftar($id)
    {
        $exist = RelawanDaftar::where('programrelawan_id', $id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exist) {
            return back()->with('error', 'Anda Sudah Terdaftar');
        }

        RelawanDaftar::create([
            'programrelawan_id' => $id,
            'user_id' => Auth::id(),
            'status' => 'Diterima',
        ]);

        return back()->with('success', 'Pendaftaran Berhasil');
    }
}
