<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Organisasi;
use App\Models\Program;
use App\Models\Donation;
use App\Models\ProgramRelawan;
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
    }

    public function storeDonasi(Request $request)
    {
        \Log::info('storeDonasi dipanggil', ['user_id' => auth()->id()]);

        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $organisasi = auth()->user()->organisasi;
        if (!$organisasi) {
            return response()->json(['error' => 'Organisasi tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fotoDonasi' => 'required|image|max:10240',
            'targetDonasi' => 'required|numeric|min:1000000',
            'deadlineDonasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validasi gagal',
                'messages' => $validator->errors()
            ], 422);
        }

        DB::transaction(function () use ($request, $organisasi) {

            // 1️⃣ SIMPAN KE PROGRAM (UMUM)
            $program = Program::create([
                'organisasi_id' => $organisasi->id,
                'judul' => $request->judul,
                'type' => 'donasi',
                'tenggat' => $request->deadlineDonasi,
                'status' => 'pending',
            ]);

            // 2️⃣ SIMPAN FILE
            $fotoPath = $request->file('fotoDonasi')
                                ->store('donasi', 'public');

            // 3️⃣ SIMPAN KE DONASI (SPESIFIK)
            Donation::create([
                'program_id' => $program->id,
                'deskripsi' => $request->deskripsi,
                'foto' => $fotoPath,
                'target' => $request->targetDonasi,
                'jumlahsaatini' => 0,
            ]);
        });

        return response()->json([
            'message' => 'Program donasi berhasil diajukan dan menunggu approval admin'
        ]);
    }

    public function storeVolunteer(Request $request)
    {
        \Log::info('storeVolunteer dipanggil', ['user_id' => auth()->id()]);

        // 🔐 AUTH
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // 🏢 ORGANISASI
        $organisasi = auth()->user()->organisasi;
        if (!$organisasi) {
            return response()->json(['error' => 'Organisasi tidak ditemukan'], 404);
        }

        // ✅ VALIDASI (SESUAI HTML)
        $validator = Validator::make($request->all(), [
            'namaProgramVolunteer' => 'required|string|max:255',
            'deskripsi'            => 'required|string',
            'deadlineVolun'       => 'required|date',

            'jumlahVolunteer'      => 'required|integer|min:1',
            'lokasiVolunteer'      => 'required|string|max:255',
            'komitmen'             => 'required|string|max:255',
            'keahlian'             => 'required|string|max:255',

            'tanggung_jawab'       => 'required|string',
            'kriteria'             => 'required|string',
            'benefit'              => 'required|string',

            'start_date'           => 'required|date',
            'end_date'             => 'required|date|after_or_equal:start_date',

            'kategoriRelawan'      => 'required|string|max:100',

            'fotoVolunteer'        => 'required|image|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'    => 'Validasi gagal',
                'messages' => $validator->errors()
            ], 422);
        }

        DB::transaction(function () use ($request, $organisasi) {

            // 1️⃣ PROGRAM (UMUM)
            $program = Program::create([
                'organisasi_id' => $organisasi->id,
                'judul'         => $request->namaProgramVolunteer,
                'type'          => 'relawan',
                'tenggat'       => $request->deadlineVolun,
                'status'        => 'pending',
            ]);

            // 2️⃣ FOTO
            $fotoPath = $request->file('fotoVolunteer')
                                ->store('relawan', 'public');

            // 3️⃣ RELAWAN (SPESIFIK)
            ProgramRelawan::create([
                'program_id'     => $program->id,
                'kategori'       => $request->kategoriRelawan,
                'deskripsi'      => $request->deskripsi,
                'lokasi'         => $request->lokasiVolunteer,
                'komitmen'       => $request->komitmen,
                'start_date'     => $request->start_date,
                'end_date'       => $request->end_date,
                'keahlian'       => $request->keahlian,
                'foto'           => $fotoPath,
                'tanggung_jawab' => $request->tanggung_jawab,
                'kuota'          => $request->jumlahVolunteer,
                'persyaratan'    => $request->kriteria,
                'benefit'        => $request->benefit,
            ]);
        });

        return response()->json([
            'message' => 'Program volunteer berhasil diajukan dan menunggu approval admin'
        ]);
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
                    'laporan_file' => $p->laporan_file,
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
        $organisasi = auth()->user()->organisasi;
        $today = now()->toDateString();

        $laporans = Donation::whereNotNull('laporan')
            ->whereHas('program', function ($q) use ($organisasi, $today) {
                $q->where('organisasi_id', $organisasi->id)
                ->where('type', 'donasi')
                ->whereDate('tenggat', '<', $today);
            })
            ->with('program:id,judul')
            ->latest('laporan_uploaded_at')
            ->get()
            ->map(function ($d) {
                return [
                    'judul' => $d->program->judul,
                    'file' => asset('storage/' . $d->laporan),
                    'tanggal' => optional($d->laporan_uploaded_at)
                                    ->format('d M Y'), // 🔥 FORMAT SIAP PAKAI
                ];
            });

        return response()->json($laporans);
    }

    public function laporanPending()
    {
        $organisasi = auth()->user()->organisasi;
        if (!$organisasi) {
            return response()->json(['error' => 'Organisasi tidak ditemukan'], 404);
        }

        $today = now()->toDateString();

        $laporans = Donation::whereNull('laporan') // belum upload laporan
            ->whereHas('program', function ($q) use ($organisasi, $today) {
                $q->where('organisasi_id', $organisasi->id)
                ->where('type', 'donasi')
                ->whereDate('tenggat', '<', $today); // tenggat sudah lewat
            })
            ->with('program:id,judul')
            ->latest('tenggat') // tampilkan yang paling dekat tenggat dulu
            ->get()
            ->map(function ($d) {
                return [
                    'id'     => $d->id,
                    'judul'  => $d->program->judul,
                    'target' => $d->target,
                    'jumlahsaatini' => $d->jumlahsaatini,
                    'tenggat' => $d->program->tenggat->format('d M Y'),
                ];
            });

        return response()->json($laporans);
    }


    public function uploadLaporan(Request $request, $programId)
    {
        $request->validate([
            'laporan' => 'required|mimes:pdf|max:10240',
        ]);

        $program = Program::with('donasi')->findOrFail($programId);

        // ⛔ hanya DONASI
        if ($program->type !== 'donasi' || !$program->donasi) {
            return response()->json([
                'error' => 'Program ini bukan donasi'
            ], 400);
        }

        // ⛔ pastikan tenggat lewat
        if (now()->lt($program->tenggat)) {
            return response()->json([
                'error' => 'Belum melewati tenggat program'
            ], 403);
        }

        $path = $request->file('laporan')->store('laporan_donasi', 'public');

        $program->donasi->update([
            'laporan' => $path,
            'laporan_uploaded_at' => now(),
        ]);

        return response()->json([
            'message' => 'Laporan berhasil diupload',
            'file' => asset('storage/' . $path),
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
