<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramrelawanModel;


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

        // ===== RELAWAN LAMA (ProgramrelawanModel) =====
        $programrelawan = ProgramrelawanModel::orderBy('id', 'desc')
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
        $programrelawan = ProgramrelawanModel::findOrFail($id);

        $sudahdaftar = false;
        if (Auth::check()) {
            $sudahdaftar = RelawandaftarModel::where('user_id', Auth::id())
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
        $exist = RelawandaftarModel::where('programrelawan_id', $id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exist) {
            return back()->with('error', 'Anda Sudah Terdaftar');
        }

        RelawandaftarModel::create([
            'programrelawan_id' => $id,
            'user_id' => Auth::id(),
            'status' => 'Diterima',
        ]);

        return back()->with('success', 'Pendaftaran Berhasil');
    }
}
