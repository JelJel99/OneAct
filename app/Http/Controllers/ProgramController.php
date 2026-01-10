<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramRelawan;
use App\Models\RelawanDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

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
        $programs = Program::with(['donasi.transactions', 'organisasi'])
            ->where('status', 'approved')
            ->whereNotNull('tenggat')
            ->whereDate('tenggat', '>=', Carbon::today())
            ->get();

        return response()->json(
            $programs->map(function ($p) {
                return [
                    'id' => $p->id,
                    'judul' => $p->judul,
                    'tenggat' => $p->tenggat,
                    'organisasi' => $p->organisasi->nama ?? '-',
                    'organisasi_id' => $p->organisasi->id ?? null,
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
            ->where('status', 'approved') 
            ->whereDate('tenggat', '>=', Carbon::today())  // STATUS DARI TABEL programs
            ->orderBy('created_at', 'desc')
            ->get();
    }

    // public function organizationProfile($organisasiId)
    // {
    //     $organisasi = Organisasi::with([
    //         'programs' => function ($query) {
    //             $query->where('status', 'approved');
    //         },
    //         'programs.donasi',
    //         'programs.relawan',
    //     ])->findOrFail($organisasiId);

    //     // Hitung statistik
    //     $statistik = [
    //         'program_donasi' => $organisasi->programs->where('type', 'donasi')->count(),
    //         'program_relawan' => $organisasi->programs->where('type', 'relawan')->count(),
    //         'relawan_aktif' => RelawanDaftar::whereHas('programRelawan.program', function ($q) use ($organisasiId) {
    //             $q->where('organisasi_id', $organisasiId)
    //             ->whereDate('end_date', '>', Carbon::today());
    //             })->count(),
    //         'relawan_aktif' => RelawanDaftar::where('status', 'Diterima')
    //             ->whereHas('programrelawan.program', function ($q) use ($organisasiId) {
    //                 $q->where('organisasi_id', $organisasiId)
    //                 ->where('status', 'approved')
    //                 ->whereDate('end_date', '>=', Carbon::today());
    //             })
    //             ->count(),
    //     ];

    //     // Kemas data sesuai kebutuhan frontend
    //     return response()->json([
    //         'organisasi' => $organisasi,
    //         'statistik' => $statistik,
    //         // Bisa tambah data lain kalau perlu
    //     ]);
    // }

    public function getProgramsByOrganisasi(Request $request)
    {
        $organisasiId = $request->query('organisasi_id');
        $status = $request->query('status', 'approved');

        if (!$organisasiId) {
            return response()->json(['message' => 'organisasi_id required'], 400);
        }

        $programs = Program::with(['donasi', 'relawan'])
            ->where('organisasi_id', $organisasiId)
            ->where('status', $status)
            ->get();

        // Mapping data supaya frontend mudah render
        $result = $programs->map(function ($p) {
            if ($p->type === 'relawan') {
                $startDate = optional($p->relawan)->start_date;
                $endDate = optional($p->relawan)->end_date;
            } else {
                $startDate = $p->start_date ?? optional($p->donasi)->start_date;
                $endDate = $p->tenggat ?? optional($p->donasi)->end_date;
            }

            return [
                'id' => $p->id,
                'donation_id' => optional($p->donasi)->id,
                'judul' => $p->judul,
                'start_date' => $startDate ? date('Y-m-d', strtotime($startDate)) : null,
                'end_date' => $endDate ? date('Y-m-d', strtotime($endDate)) : null,
                'type' => $p->type,
                'status_otomatis' => $p->status_otomatis ?? null,
                'deskripsi' => $p->deskripsi ?? optional($p->donasi)->deskripsi,
                'foto' => $p->type === 'relawan'
                    ? optional($p->relawan)->foto
                    : ($p->foto ?? optional($p->donasi)->foto),

                'jumlah_terkumpul' => optional($p->donasi)->jumlahsaatini ?? 0,
                'target' => optional($p->donasi)->target ?? 0,
                'jumlah_donatur' => $p->donasi ? $p->donasi->transactions()->count() : 0,
                'partisipan' => $p->partisipan ?? (optional($p->relawan)->relawan_daftar_count ?? 0),
                'laporan' => (
                    $p->type === 'donasi'
                        ? optional($p->donasi)->laporan
                        : null
                ),
                'tenggat' => $p->tenggat ? date('Y-m-d', strtotime($p->tenggat)) : null,
            ];
        });


        return response()->json($result);
    }

    public function getAllProgramsByOrganisasi(Request $request)
    {
        $organisasiId = $request->query('organisasi_id');

        if (!$organisasiId) {
            return response()->json(['message' => 'organisasi_id required'], 400);
        }

        // Ambil semua program, tanpa filter status
        $programs = Program::with(['donasi', 'relawan'])
            ->where('organisasi_id', $organisasiId)
            ->get();

        // Mapping data supaya frontend mudah render
        $result = $programs->map(function ($p) {
            if ($p->type === 'relawan') {
                $startDate = optional($p->relawan)->start_date;
                $endDate = optional($p->relawan)->end_date;
            } else {
                $startDate = $p->start_date ?? optional($p->donasi)->start_date;
                $endDate = $p->tenggat ?? optional($p->donasi)->end_date;
            }

            return [
                'id' => $p->id,
                'judul' => $p->judul,
                'start_date' => $startDate ? date('Y-m-d', strtotime($startDate)) : null,
                'end_date' => $endDate ? date('Y-m-d', strtotime($endDate)) : null,
                'type' => $p->type,
                'status' => $p->status,
                'status_otomatis' => $p->status_otomatis ?? null,
                'deskripsi' => $p->deskripsi ?? optional($p->donasi)->deskripsi,
                'foto' => $p->foto ?? optional($p->donasi)->foto,
                'jumlah_terkumpul' => optional($p->donasi)->jumlahsaatini ?? 0,
                'target' => optional($p->donasi)->target ?? 0,
                'jumlah_donatur' => $p->donasi ? $p->donasi->transactions()->count() : 0,
                'partisipan' => $p->partisipan ?? (optional($p->relawan)->relawan_daftar_count ?? 0),
                'laporan' => (
                    $p->type === 'donasi'
                        ? optional($p->donasi)->laporan
                        : null
                ),
                'tenggat' => $p->tenggat ? date('Y-m-d', strtotime($p->tenggat)) : null,
            ];
        });


        return response()->json($result);
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
