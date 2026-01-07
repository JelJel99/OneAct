<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramRelawan;
use App\Models\RelawanDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with(['organisasi', 'donasi', 'relawan'])
            ->where('status', 'approved')
            ->get();

        return response()->json($programs);
    }

    public function apiHomePrograms()
    {
        $programs = Program::with(['donasi.transactions', 'organisasi'])->where('status', 'approved')->get();

        return response()->json(
            $programs->map(function ($p) {
                return [
                    'id' => $p->id,
                    'judul' => $p->judul,
                    'tenggat' => $p->tenggat,
                    'organisasi' => $p->organisasi->nama ?? '-',
                    'type' => $p->type, // 'donasi' atau 'relawan'
                    'donasi' => $p->donasi ? [
                        'id' => $p->donasi->id,
                        'foto' => $p->donasi->foto,
                        'deskripsi' => $p->donasi->deskripsi,
                        'target' => $p->donasi->target,
                        'jumlahsaatini' => $p->donasi->jumlahsaatini,
                        'kategori' => $p->donasi->kategori ?? 'Umum',
                        'donatur' => $p->donasi->transactions->count(),
                    ] : null,
                    'relawan' => $p->relawan ?? null, // sesuaikan kalau ada
                ];
            })
        );
    }

    public function programRelawanApproved()
    {
        return Program::with(['relawan', 'organisasi'])
            ->where('type', 'relawan')      // hanya relawan
            ->where('status', 'approved')   // STATUS DARI TABEL programs
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function show($program_id)
    {
        $programRelawan = ProgramRelawan::with('program')->where('program_id', $program_id)->firstOrFail();

        return view('programrelawandetail', compact('programRelawan'));
    }


    public function showRelawan($program_id)
    {
        $programRelawan = ProgramRelawan::with('program')
            ->where('program_id', $program_id)
            ->first();

        if (!$programRelawan) {
            return response()->json(['message' => 'Program tidak ditemukan'], 404);
        }

        return response()->json($programRelawan);
    }


    public function relawandaftar(Request $request)
    {
        try {
            $programrelawanId = $request->input('programrelawan_id');
            $userId = Auth::id();

            if (!$userId) {
                return response()->json(['message' => 'User tidak terautentikasi'], 401);
            }

            if (!$programrelawanId) {
                return response()->json(['message' => 'Program Relawan ID tidak boleh kosong'], 400);
            }

            $exist = RelawanDaftar::where('programrelawan_id', $programrelawanId)
                ->where('user_id', $userId)
                ->first();

            if ($exist) {
                return response()->json(['message' => 'Anda sudah terdaftar di program ini'], 409);
            }

            RelawanDaftar::create([
                'programrelawan_id' => $programrelawanId,
                'user_id' => $userId,
                'status' => 'Diterima',
            ]);

            return response()->json(['message' => 'Pendaftaran relawan berhasil']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function cekStatusRelawan($programId)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['terdaftar' => false]);
        }

        $programRelawan = ProgramRelawan::where('program_id', $programId)->first();

        if (!$programRelawan) {
            return response()->json(['terdaftar' => false]);
        }

        $exists = RelawanDaftar::where('programrelawan_id', $programRelawan->id)
            ->where('user_id', $userId)
            ->exists();

        return response()->json([
            'terdaftar' => $exists,
            'programrelawan_id' => $programRelawan->id // 🔥 penting buat frontend
        ]);
    }

}
