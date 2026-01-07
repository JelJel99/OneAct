<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Program;
use App\Models\ProgramRelawan;
use App\Models\Donation;
use App\Models\RelawanDaftar;

class AdminController extends Controller
{
    /* =====================
     | DASHBOARD
     ===================== */
    public function index()
    {
        return view('adminDash');
    }

    /* =====================
     | USER MANAGEMENT
     ===================== */
    public function users()
    {
        return response()->json(
            User::select('id', 'name', 'email', 'role', 'status')->get()
        );
    }

    public function suspendUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return response()->json(['message' => 'User suspended']);
    }

    public function unsuspendUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return response()->json(['message' => 'User unsuspended']);
    }

    /* =====================
     | PROGRAM MANAGEMENT
     ===================== */
    public function programs()
    {
        $programs = Program::with('organisasi')
            ->select('id', 'judul', 'type', 'status', 'organisasi_id')
            ->get();

        return $programs->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->judul,
                'type' => $p->type,
                'status' => $p->status,
                'organisasi_nama' => $p->organisasi->nama ?? '-',
            ];
        });
        // $volunteer = Program::where('programs.type', 'relawan')
        //     ->leftJoin('programrelawan', 'programrelawan.program_id', '=', 'programs.id')
        //     ->leftJoin('organisasi', 'programs.organisasi_id', '=', 'organisasi.id')
        //     ->select(
        //         'programs.id',
        //         'programs.judul as name',
        //         'programrelawan.kategori',
        //         'programs.type',
        //         'programs.status',
        //         'organisasi.nama as organisasi_nama'
        //     );

        // $donation = Program::where('programs.type', 'donasi')
        //     ->leftJoin('donasi', 'donasi.program_id', '=', 'programs.id')
        //     ->leftJoin('organisasi', 'programs.organisasi_id', '=', 'organisasi.id')
        //     ->select(
        //         'programs.id',
        //         'programs.judul as name',
        //         DB::raw('NULL as kategori'),
        //         'programs.type',
        //         'programs.status',
        //         'organisasi.nama as organisasi_nama'
        //     );

        // return $volunteer->unionAll($donation)->get();
    }

    public function programDetail($id)
    {
        $program = Program::with('organisasi')->find($id);

        if (!$program) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        if ($program->type === 'relawan') {
            $relawan = $program->programRelawan; // pakai method yang kamu pakai di model

            return response()->json([
                'id' => $program->id,
                'judul' => $program->judul,
                'type' => $program->type,
                'status' => $program->status,
                'organisasi_nama' => $program->organisasi->nama ?? null,

                'kategori' => $relawan->kategori ?? null,
                'tenggat' => $program->tenggat ?? null,
                'deskripsi' => $relawan->deskripsi ?? null,
                'lokasi' => $relawan->lokasi ?? null,
                'komitmen' => $relawan->komitmen ?? null,
                'kuota' => $relawan->kuota ?? null,
                'keahlian' => $relawan->keahlian ?? null,
                'start_date' => $program->programRelawan->start_date ?? null,
                'end_date' => $program->programRelawan->end_date ?? null,
                'tanggung_jawab' => $program->programRelawan->tanggung_jawab
                    ? explode('|', $program->programRelawan->tanggung_jawab)
                    : [],

                'persyaratan' => $program->programRelawan->persyaratan
                    ? explode('|', $program->programRelawan->persyaratan)
                    : [],

                'benefit' => $program->programRelawan->benefit
                    ? explode('|', $program->programRelawan->benefit)
                    : [],
                // 'foto' => $relawan->foto ?? null,
            ]);
        } elseif ($program->type === 'donasi') {
            $donation = $program->donasi;

            return response()->json([
                'id' => $program->id,
                'judul' => $program->judul,
                'type' => $program->type,
                'status' => $program->status,
                'organisasi_nama' => $program->organisasi->nama ?? null,

                'deskripsi' => $donation->deskripsi ?? null,
                'target' => $donation->target ?? null,
                'jumlahsaatini' => $donation->jumlahsaatini ?? null,
                // 'foto' => $donation->foto ?? null,
                'tenggat' => $program->tenggat ?? null,
            ]);
        }

        // fallback
        return response()->json($program);
    }



    public function approveProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 'approved';
        $program->save();

        // Copy data ke tabel detail jika belum ada
        if ($program->type == 'relawan') {
            $exists = ProgramRelawan::where('program_id', $program->id)->exists();
            if (!$exists) {
                ProgramRelawan::create([
                    'program_id' => $program->id,
                    'kategori' => null,  // bisa diisi sesuai kebutuhan
                    'tenggat' => null,
                    'deskripsi' => null,
                    'lokasi' => null,
                    'komitmen' => null,
                    'keahlian' => null,
                    'foto' => null,
                ]);
            }
        } elseif ($program->type == 'donasi') {
            $exists = Donation::where('program_id', $program->id)->exists();
            if (!$exists) {
                Donation::create([
                    'program_id' => $program->id,
                    'deskripsi' => null,
                    'foto' => null,
                    'target' => 0,
                    'jumlahsaatini' => 0,
                ]);
            }
        }

        return response()->json(['message' => 'Program approved']);
    }

    public function rejectProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 'rejected';
        $program->save();

        return response()->json(['message' => 'Program rejected']);
    }

    /* =====================
    | DASHBOARD STATS
    ===================== */
    public function stats()
    {
        return response()->json([
            // Total donasi terkumpul
            'total_donasi' => Donation::sum('jumlahsaatini'),

            // Program aktif (approved)
            'program_aktif' => Program::where('status', 'approved')->count(),

            // Pengguna aktif (unik user yang daftar relawan)
            'pengguna_aktif' => User::where('status', 'active')->count(),

            // Pending approval
            'pending_approval' => Program::where('status', 'pending')->count(),
        ]);
    }




    // public function programDetail($id)
    // {
    //     return Program::findOrFail($id);
    // }

}