<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Program;
use App\Models\RelawanDaftar;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class OrganisasiDashboardController extends Controller
{
    public function index()
    {
        \Log::info('Masuk ke index dashboard');

        $organisasi = auth()->user()->organisasi;

        if (!$organisasi) {
        \Log::error('Organisasi untuk user belum ada');
        return response()->json(['error' => 'Organisasi tidak ditemukan untuk user ini'], 404);
    }

        Log::info('Organisasi ditemukan', ['id' => $organisasi->id]);

        return app(OrganisasiController::class)
            ->showOrg($organisasi->id);

        // $user = auth()->user();

        // if ($user->role !== 'organisasi') {
        //     abort(403);
        // }

        // $organisasi = Organisasi::where('user_id', $user->id)->firstOrFail();
        // $organisasiId = $organisasi->id;

        // // ===== PROGRAM APPROVED =====
        // $programApproved = Program::where('organisasi_id', $organisasiId)
        //     ->where('status', 'approved');

        // // ===== PROGRAM AKTIF =====
        // $donasiAktif = (clone $programApproved)
        //     ->where('type', 'donasi')
        //     ->whereDate('tenggat', '>=', Carbon::today())
        //     ->count();

        // $relawanProgramAktif = ProgramRelawan::whereHas('program', function ($q) use ($organisasiId) {
        //         $q->where('organisasi_id', $organisasiId)
        //         ->where('status', 'approved')
        //         ->where('type', 'relawan');
        //     })
        //     ->whereDate('end_date', '>=', Carbon::today())
        //     ->count();

        // $programAktif = $donasiAktif + $relawanProgramAktif;

        // // ===== RELAWAN AKTIF (DISTINCT USER) =====
        // $totalRelawan = RelawanDaftar::whereHas('programrelawan', function ($q) use ($organisasiId) {
        //         $q->whereDate('end_date', '>=', Carbon::today())
        //         ->whereHas('program', function ($qp) use ($organisasiId) {
        //             $qp->where('organisasi_id', $organisasiId)
        //                 ->where('status', 'approved');
        //         });
        //     })
        //     ->distinct('user_id')
        //     ->count('user_id');

        // // ===== TOTAL DONASI =====
        // $totalDonasi = Transaksi::whereHas('donasi.program', function ($q) use ($organisasiId) {
        //         $q->where('organisasi_id', $organisasiId)
        //         ->where('status', 'approved');
        //     })
        //     ->sum('jumlah');

        // // ===== PROGRAM LIST =====
        // $programs = Program::where('organisasi_id', $organisasiId)
        //     ->with(['relawan', 'donasi'])
        //     ->get();

        // return view('organisasi.index_org', compact(
        //     'organisasi',
        //     'programs',
        //     'programAktif',
        //     'totalRelawan',
        //     'totalDonasi'
        // ));
    }

    public function orgdashboard()
    {
        $organisasi = Organisasi::where('user_id', auth()->id())->firstOrFail();

        return response()->json([
            'organisasi' => [
                'id' => $organisasi->id,
                'nama' => $organisasi->nama,
                'tagline' => $organisasi->tagline,
            ],
            'statistik' => [
                'program_aktif' => $organisasi->programs()->count(),
                'relawan' => 0, // isi sesuai logic kamu
                'total_donasi' => 0,
            ]
        ]);
    }

    /**
     * API PROGRAM ORGANISASI
     * GET /api/org/programs
     */
    public function programs()
    {
        $organisasi = Organisasi::where('user_id', auth()->id())->firstOrFail();

        return Program::where('organisasi_id', $organisasi->id)
            ->with(['donasi', 'relawan'])
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'judul' => $p->judul,
                    'type' => $p->type,
                    'foto' => $p->foto ?? optional($p->donasi)->foto,
                    'jumlah_terkumpul' => $p->donasi->jumlahsaatini ?? 0,
                    'partisipan' => optional($p->relawan)->relawan_daftar_count ?? 0,
                    'tenggat' => $p->tenggat,
                    'laporan' => $p->laporan_file,
                    'selesai' => $p->laporan_file ? true : false,
                ];
            });
    }

    /**
     * API LAPORAN (LIST)
     * GET /api/org/laporan
     */
    public function laporan()
    {
        $organisasi = Organisasi::where('user_id', auth()->id())->firstOrFail();

        return Program::where('organisasi_id', $organisasi->id)
            ->whereNotNull('laporan_file')
            ->select('id', 'judul', 'laporan_file')
            ->get()
            ->map(fn ($p) => [
                'program_id' => $p->id,
                'judul' => $p->judul,
                'file' => $p->laporan_file,
            ]);
    }

    /**
     * DOWNLOAD LAPORAN PDF
     * GET /api/org/laporan/{program}
     */
    public function downloadLaporan(Program $program)
    {
        if ($program->organisasi_id !== auth()->user()->organisasi->id) {
            abort(403);
        }

        return Storage::download($program->laporan_file);
    }

}
